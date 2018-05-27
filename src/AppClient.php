<?php

namespace ZMDev\NoxusSDK;

use ZMDev\Noxus\Pb\AppCredential;
use ZMDev\Noxus\Pb\AppID;
use ZMDev\Noxus\Pb\Application;
use ZMDev\Noxus\Pb\AppList;
use ZMDev\Noxus\Pb\AppListReq;
use ZMDev\Noxus\Pb\AppServiceClient;
use ZMDev\Noxus\Pb\AppValidateRes;
use ZMDev\NoxusSDK\Exceptions\NoxusException;

class AppClient
{
    private $config;
    private $appServiceClient;

    public function __construct($config)
    {
        $this->config = $config;
        $this->appServiceClient = new AppServiceClient($this->config['rpc_hostname'], [
            'credentials' => \Grpc\ChannelCredentials::createInsecure()
        ]);
    }


    public function validateApp($appID, $appSecret)
    {
        $rpcTimeout = $this->config['rpc_timeout'];
        $appCredential = new AppCredential();
        $appCredential->setId($appID);
        $appCredential->setSecret($appSecret);
        /**
         * @var AppValidateRes $appValidateRes
         */
        list($appValidateRes, $status) = $this->appServiceClient->ValidateApp($appCredential, [], ['timeout' => $rpcTimeout])->wait();
        if ($status->code != 0) {
            throw new NoxusException($status->details);
        }
        return $appValidateRes->getIsValid();
    }

    public function findApp($appID)
    {
        $rpcTimeout = $this->config['rpc_timeout'];
        $pbAppID = new AppID();
        $pbAppID->setId($appID);
        /**
         * @var Application $application
         */
        list($application, $status) = $this->appServiceClient->FindApp($pbAppID, [], ['timeout' => $rpcTimeout])->wait();
        if ($status->code != 0) {
            throw new NoxusException($status->details);
        }
        return $application;
    }

    public function listApp($perPage, $page)
    {
        $rpcTimeout = $this->config['rpc_timeout'];
        $appListReq = new AppListReq();
        $appListReq->setPage($page);
        $appListReq->setPerPage($perPage);
        /**
         * @var AppList $appList
         */
        list($appList, $status) = $this->appServiceClient->ListApp($rpcTimeout, [], ['timeout' => $rpcTimeout])->wait();
        if ($status->code != 0) {
            throw new NoxusException($status->details);
        }
        return $appList;
    }
}

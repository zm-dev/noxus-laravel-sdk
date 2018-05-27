<?php
// GENERATED CODE -- DO NOT EDIT!

namespace ZMDev\Noxus\Pb;

/**
 */
class AppServiceClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \ZMDev\Noxus\Pb\AppCredential $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function ValidateApp(\ZMDev\Noxus\Pb\AppCredential $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ZMDev.Noxus.pb.AppService/ValidateApp',
        $argument,
        ['\ZMDev\Noxus\Pb\AppValidateRes', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \ZMDev\Noxus\Pb\AppID $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function FindApp(\ZMDev\Noxus\Pb\AppID $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ZMDev.Noxus.pb.AppService/FindApp',
        $argument,
        ['\ZMDev\Noxus\Pb\Application', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \ZMDev\Noxus\Pb\AppListReq $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function ListApp(\ZMDev\Noxus\Pb\AppListReq $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ZMDev.Noxus.pb.AppService/ListApp',
        $argument,
        ['\ZMDev\Noxus\Pb\AppList', 'decode'],
        $metadata, $options);
    }

}

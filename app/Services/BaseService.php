<?php

namespace App\Services;

use Illuminate\Http\Response;

/**
 * Class BaseService.
 */
class BaseService
{
    protected $data = '';
    protected $message = '';
    protected $statusCode = Response::HTTP_OK;

    /**
     * Set status code for API.
     *
     * @param $statusCode
     */
    protected function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
    }

    /**
     * Get status code for API.
     *
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Set the data for the response.
     *
     * @param $data
     */
    protected function setData($data)
    {
        $this->data = $data;
    }

    /**
     * Get the data for the response.
     *
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set the message.
     *
     * @param string $mgs
     */
    protected function setMessage($mgs = '')
    {
        $this->message = $mgs;
    }

    /**
     * Get the message.
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Get response data for API.
     *
     * @return array
     */
    protected function getResponseData()
    {
        return [
            RESPONSE_KEY => [
                DATA_KEY    => $this->data,
                MESSAGE_KEY => $this->message,
            ],
            STT_CODE_KEY => $this->getStatusCode(),
        ];
    }
}

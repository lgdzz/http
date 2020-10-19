<?php

declare (strict_types=1);

namespace lgdz;

class Response
{
    private $error = 0;
    private $message = 'Success';
    private $status = 0;
    private $data = null;

    /**
     * @return int
     */
    public function getError(): int
    {
        return $this->error;
    }

    /**
     * @param int $error
     */
    public function setError(int $error)
    {
        $this->error = $error;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message)
    {
        $this->message = $message;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status)
    {
        $this->status = $status;
    }

    /**
     * @return null
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param null $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    public function ok()
    {
        $this->error = 0;
        return $this->output();
    }

    public function fail()
    {
        $this->error = 1;
        return $this->output();
    }

    private function output(): string
    {
        return json_encode([
            'error'   => $this->error,
            'message' => $this->message,
            'status'  => $this->status,
            'data'    => $this->data
        ], JSON_UNESCAPED_UNICODE);
    }
}
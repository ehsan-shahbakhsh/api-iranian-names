<?php

class NamesByGender
{
    private array $baseAPI = [
        'ok' => false,
        'status' => 400,
        'result' => ""
    ];

    private array $genders = [
        "male", "female",
        "مرد", "زن",
        "مذکر", "مونث"
    ];

    public function __construct()
    {
        if (! isset($_REQUEST['gender'])) {
            http_response_code(400);
            unset($this->baseAPI['result']);
            $this->baseAPI['error'] = 'parameters not send';
            $this->baseAPI['info'] = 'با متد get یا post با پارامتر gender جنسیت مورد نظر را بفرستید';
        } elseif (isset($_REQUEST['gender']) and $_REQUEST['gender'] == '') {
            http_response_code(400);
            unset($this->baseAPI['result']);
            $this->baseAPI['error'] = 'empty parameter (gender)';
            $this->baseAPI['info'] = 'پارامتر gender را خالی نفرستید';
        } else {
            if (! in_array($_REQUEST['gender'], $this->genders)) {
                http_response_code(400);
                unset($this->baseAPI['result']);
                $this->baseAPI['error'] = 'wrong parameter value (gender)';
                $this->baseAPI['info'] = 'لطفا جنسیت مورد نظر را به درستی وارد نمائید';
                $this->baseAPI['genders'] = $this->genders;
            } else {
                http_response_code(200);
                $this->baseAPI['ok'] = true;
                $this->baseAPI['status'] = 200;
                $gender = $_REQUEST['gender'];
                if (in_array($gender, ['male', 'مرد', 'مذکر'])) {
                    $this->baseAPI['result'] = $this->findNamesByGender("males");
                } elseif (in_array($gender, ['female', 'زن', 'مونث'])) {
                    $this->baseAPI['result'] = $this->findNamesByGender("females");
                }
            }
        }
    }

    private function findNamesByGender(string $gender): array
    {
        return json_decode(file_get_contents("iranianNamesDataset.json"), true)['items'][$gender];
    }

    public function __toString(): string
    {
        header("Content-Type: application/json");
        return json_encode($this->baseAPI);
    }
}
echo new NamesByGender;

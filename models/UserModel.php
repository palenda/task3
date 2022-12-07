<?php

namespace app\models;

use app\core\Model;
use app\core\Database;
use PDO;

class UserModel extends Model
{
    public function getAll(): array
    {
        return Database::limitSelect('users');
    }

    public function count(): int
    {
        return Database::select('users');
    }

    public function show($id): array
    {
        return Database::selectById('users', $id);
    }

    public function create($name, $email, $gender, $status): array
    {
        $params = array();
        $values = [
            'name' => ':name',
            'email' => ':email',
            'gender' => ':gender',
            'status' => ':status',
        ];
        $query = Database::insert('users', "`name`, `email`, `gender`, `status`",
            $values['name'].", ".$values['email'].", ".$values['gender'].", ".$values['status']);
        $query->bindValue(":name", $name);
        $query->bindValue(":email", $email);
        $query->bindValue(":gender", $gender);
        $query->bindValue(":status", $status);
        $query->execute();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $params[$row['id']] = $row;
        }
        return $params;
    }

    public function get($id): array
    {
        return Database::selectById('users', $id);
    }

    public function update($id, $name, $email, $gender, $status): bool
    {
        $query = Database::update('users',
            "name = '".$name."', email = '".$email."', gender = '".$gender."', status = '".$status."'");
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        return $query->execute();
    }

    public function delete($id)
    {
        Database::delete('users', $id);
    }

    public function getAPI()
    {
        $url = "https://gorest.co.in/public/v2/users";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $_ENV['ACCESS_TOKEN']
        ]);
        curl_setopt($ch, CURLOPT_URL, $url);
        $response = curl_exec($ch);
        $data = json_decode($response, true);
        curl_close($ch);
        return $data;
    }

    public function getByIdAPI($id)
    {
        $url = "https://gorest.co.in/public/v2/users/".$id;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $_ENV['ACCESS_TOKEN']
        ]);
        curl_setopt($ch, CURLOPT_URL, $url);
        $response = curl_exec($ch);
        $data = json_decode($response, true);
        curl_close($ch);
        return $data;
    }

    public function deleteApiUserById(int $id): void
    {
        $curl = curl_init("https://gorest.co.in/public/v2/users/".$id);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $_ENV['ACCESS_TOKEN']
        ]);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_exec($curl);
        curl_close($curl);
    }

    public function addNewApiUser($name, $email, $gender, $status): void
    {
        $post_data = [
            'name' => $name,
            'email' => $email,
            'gender' => $gender,
            'status' => $status
        ];
        $curl = curl_init("https://gorest.co.in/public/v2/users/");
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $_ENV['ACCESS_TOKEN']
        ]);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
        curl_exec($curl);
        curl_close($curl);
    }

    public function updateApiUserById($id, $name, $email, $gender, $status)
    {
        $post_data = [
            'name' => $name,
            'email' => $email,
            'gender' => $gender,
            'status' => $status
        ];
        $curl = curl_init("https://gorest.co.in/public/v2/users/".$id);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $_ENV['ACCESS_TOKEN']
        ]);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_exec($curl);
        curl_close($curl);
    }
}

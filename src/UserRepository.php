<?php
require_once "src/DbConnection.php";
require_once "src/user.php";

function createUser(array $user): bool
{
    if (!$user["username"])
        return false;
    if (!$user["email"])
        return false;
    if (!$user["password"])
        return false;

    $conn = getDbConnection();
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES(:username, :email, :password)");

    return $stmt->execute([
        ":username" => $user["username"],
        ":email" => $user["email"],
        ":password" => $user["password"],
    ]);
}

function updateUser(int $id, array $newValues): void
{
    if (count($newValues) > 0) {
        $user = User::find($id);

        if ($user) {
            $user->update([
                'username' => $newValues['username'],
                'email' => $newValues['email'],
            ]);
        }
    }
}

function getUserByEmail(string $email)
{
    $user = User::where('email', $email)->first();
    return $user?->toArray() ?? null;
}

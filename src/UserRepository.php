<?php
require_once "src/config.php";
require_once "src/user.php";

function createUser(array $user): bool
{
    // Validate the required fields
    if (empty($user['username']) || empty($user['email']) || empty($user['password'])) {
        return false;
    }

    // Hash the password before saving
    $user['password'] = Hash::make($user['password']);

    $result = User::create([
        'username' => $user['username'],
        'email' => $user['email'],
        'password' => $user['password'],
    ]);

    return $result ? true : false;
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

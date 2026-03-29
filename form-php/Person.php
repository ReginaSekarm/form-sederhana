<?php

class Person {
    private string $firstname;
    private string $lastname;
    private string $phoneNumber;
    private string $address;

    public function __construct(string $firstname, string $lastname, string $phoneNumber, string $address) {
        $this->firstname   = htmlspecialchars(trim($firstname));
        $this->lastname    = htmlspecialchars(trim($lastname));
        $this->phoneNumber = htmlspecialchars(trim($phoneNumber));
        $this->address     = htmlspecialchars(trim($address));
    }

    // --- Getters ---
    public function getFirstname(): string   { return $this->firstname; }
    public function getLastname(): string    { return $this->lastname; }
    public function getFullname(): string    { return $this->firstname . ' ' . $this->lastname; }
    public function getPhoneNumber(): string { return $this->phoneNumber; }
    public function getAddress(): string     { return $this->address; }

    // --- Validasi ---
    public static function validate(array $data): array {
        $errors = [];

        if (empty(trim($data['firstname'] ?? ''))) {
            $errors[] = 'Firstname tidak boleh kosong.';
        } elseif (!preg_match('/^[a-zA-Z\s]+$/', $data['firstname'])) {
            $errors[] = 'Firstname hanya boleh berisi huruf.';
        }

        if (empty(trim($data['lastname'] ?? ''))) {
            $errors[] = 'Lastname tidak boleh kosong.';
        } elseif (!preg_match('/^[a-zA-Z\s]+$/', $data['lastname'])) {
            $errors[] = 'Lastname hanya boleh berisi huruf.';
        }

        if (empty(trim($data['phone_number'] ?? ''))) {
            $errors[] = 'Phone Number tidak boleh kosong.';
        } elseif (!preg_match('/^[0-9]{8,15}$/', $data['phone_number'])) {
            $errors[] = 'Phone Number harus berupa angka (8-15 digit).';
        }

        if (empty(trim($data['address'] ?? ''))) {
            $errors[] = 'Address tidak boleh kosong.';
        }

        return $errors;
    }
}
<?php

// Class permettant de chiffré le chaine de caractère
class Chiffrement
{
    public static function crypter(string $donnee, string $cle): string
    {
        return openssl_encrypt($donnee, "AES-128-ECB", $cle);
    }

    public static function decrypter(string $donnee, string $cle): string
    {
        return openssl_decrypt($donnee, "AES-128-ECB", $cle);
    }
}

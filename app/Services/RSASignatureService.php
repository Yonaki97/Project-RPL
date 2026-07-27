<?php

namespace App\Services;

class RSASignatureService
{
    private $privateKey;
    private $publicKey;

    public function __construct()
    {
        $privatePath = storage_path('app/keys/private.pem');
        $publicPath  = storage_path('app/keys/public.pem');

        if (!file_exists($privatePath)) {
            throw new \Exception("Private key tidak ditemukan.");
        }

        if (!file_exists($publicPath)) {
            throw new \Exception("Public key tidak ditemukan.");
        }

        $this->privateKey = openssl_pkey_get_private(
            file_get_contents($privatePath)
        );

        $this->publicKey = openssl_pkey_get_public(
            file_get_contents($publicPath)
        );

        if (!$this->privateKey) {
            throw new \Exception("Private key tidak valid.");
        }

        if (!$this->publicKey) {
            throw new \Exception("Public key tidak valid.");
        }
    }

    /**
     * Membuat hash dari isi catatan
     */
    private function generateHash($judul, $isi, $lampiran)
    {
        $data = json_encode([
            'judul' => $judul,
            'isi' => $isi,
            'lampiran' => $lampiran
        ]);

        return hash('sha256', $data);
    }

    /**
     * Sign menggunakan private key
     */
    public function sign($judul, $isi, $lampiran)
{
    $hash = $this->generateHash($judul, $isi, $lampiran);

    $success = openssl_sign(
        $hash,
        $signature,
        $this->privateKey,
        OPENSSL_ALGO_SHA256
    );

    if (!$success) {
        throw new \Exception("RSA gagal melakukan signing.");
    }

    return [
        'hash' => $hash,
        'signature' => base64_encode($signature)
    ];
}

    /**
     * Verifikasi signature
     */
public function verify($judul,$isi,$lampiran,$storedHash,$storedSignature)
{
    if(empty($storedHash) || empty($storedSignature)){
        return false;
    }

    $newHash = $this->generateHash(
        $judul,
        $isi,
        $lampiran
    );

    $hashValid = hash_equals(
        $storedHash,
        $newHash
    );

    $signatureValid = openssl_verify(
        $newHash,
        base64_decode($storedSignature),
        $this->publicKey,
        OPENSSL_ALGO_SHA256
    );

    return $hashValid && $signatureValid === 1;
}
}
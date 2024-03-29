<?php


namespace App;

use InvalidArgumentException;
/**
 * Mailer
 *
 * Send messages
 */
class Mailer
{
    /**
     * Send a message
     *
     * @param string $email The email address
     * @param string $message The message
     *
     * @return boolean True if sent, false otherwise
     */
    public function sendMessage($email, $message)
    {
        sleep(3);

        // echo "send '$message' to '$email'";

        return true;
    }
    public static function send(string $email, string $message)
    {
        if (empty($email)) {
            throw new InvalidArgumentException;
        }

        // echo "Send '$message' to $email";

        return true;
    }
}
<?php

class ValidationException extends Exception {}

function validateEmail(string $email): void
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new ValidationException("Неверный формат email-адреса: " . $email);
    }
}

try {
    validateEmail("invalid-email");
} catch (ValidationException $e) {
    echo "Ошибка валидации: " . $e->getMessage() . PHP_EOL;
}

try {
    validateEmail("valid@email.com");
    echo "Email прошел валидацию" . PHP_EOL;
} catch (ValidationException $e) {
    echo "Ошибка валидации: " . $e->getMessage() . PHP_EOL;
}

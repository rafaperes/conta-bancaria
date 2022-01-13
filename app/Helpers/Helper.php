<?php

namespace App\Helpers;

class Helper
{
    /**
     * Formata moeda para o padrão de exibição, exemplo: '11,99'.
     *
     */
    public static function formatMoney(float $value)
    {
        return number_format($value, 2, ',', ' ');
    }

    /**
     * Formata moeda para o padrão do banco de dados, exemplo: '1000.99'.
     *
     */
    public static function formatMoneyDB($value)
    {
        return str_replace(',', '.', str_replace('.', '', $value));
    }

    /**
     * Formata data, exemplo: 10/01/2002 22:01.
     *
     */
    public static function formatData($data)
    {
       return date('d/m/Y H:i', strtotime($data));
    }

    /**
     * Retorna o nome do mês, exemplo: 'january'
     *
     */
    public static function monthName($month)
    {
        return date('F', mktime(0, 0, 0, $month, 10));
    }

    /**
     * Formata cpf e cnpj com as pontuações.
     *
     */
    public static function format_cpf_cnpj(int $document) {

        $document = preg_replace("/[^0-9]/", "", $document);
        $qtd = strlen($document);

        if($qtd >= 11) {

            if($qtd === 11 ) {

                $formatted = substr($document, 0, 3) . '.' .
                                substr($document, 3, 3) . '.' .
                                substr($document, 6, 3) . '.' .
                                substr($document, 9, 2);
            } else {
                $formatted = substr($document, 0, 2) . '.' .
                                substr($document, 2, 3) . '.' .
                                substr($document, 5, 3) . '/' .
                                substr($document, 8, 4) . '-' .
                                substr($document, -2);
            }

            return $formatted;

        } else {
            return 'Documento inválido';
        }
    }

    /**
     * Retorna apenas números de uma string.
     *
     */
    public static function onlyNumbers($string){
        return preg_replace("/[^0-9]/", "", $string);
    }

    /**
     * Retorna o tipo da transação.
     *
     */
    public static function typeTransaction(int $type)
    {
        if ($type === 1) {
            return 'Depósito';
        } else if ($type === 2) {
            return 'Saque';
        }
    }
}
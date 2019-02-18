<?php
/**
 * @author Tonatiuh Flores Castelán <tona.castelan16@gmail.com>
 * @link https://github.com/tonaflcastelan
 * @version 1.0
 *
 */
class Tools
{
	/**
	 * @method outputArray
	 * @description Imprime un arreglo formateado (DEBUG ONLY)
	 * @param (array) $array
	 * @return html
	 */
	public static function outputArray($array) {
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }

	/**
     * @method randomPassword
     * @description Genera un password aleatorio
     * @param (int) $length
     * @return (string) $string
     */
    public static function randomPassword($length = 8)
    {
       return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $length);
    }

    /**
     * @method getDifferenceBetweenDates
     * @description Obtiene la diferencia de días entre dos fechas
     * @param (string) $startDate
     * @param (string) $endDate
     * @return (float) $dateDiff
     */
    public static function getDifferenceBetweenDates($startDate, $endDate){
        $startDate 	= strtotime($startDate);
        $endDate 	= strtotime($endDate);

        if ($startDate <= $endDate) {
            $dateDiff = $endDate - $startDate;
            return floor($dateDiff / (60 * 60 * 24));
        }
        return false;
    }

    /**
     * @method getTimeAgo
     * @description Obtiene el tiempo transcurrido de una propiedad publicada
     * @param (string) $date
     * @return (float) $dateDiff
     */
    public static function getTimeAgo($date)
    {
        $estimateTime = time() - strtotime($date);

        if ($estimateTime < 1) {
            return 'Actualmente publicado';
        }

        $condition = array(
            12 * 30 * 24 * 60 * 60  =>  'año',
            30 * 24 * 60 * 60       =>  'mes',
            24 * 60 * 60            =>  'día',
            60 * 60                 =>  'hora',
            60                      =>  'minuto',
            1                       =>  'segundo'
        );

        foreach ($condition as $secs => $str) {
            $diff = $estimateTime / $secs;

            if ($diff >= 1) {
                $round = round($d);
                return $round . ' ' . $str . ($str == 'mes' ? ( $round > 1 ? 'es' : '' ) : ( $round > 1 ? 's' : '' ));
            }
        }
    }

    /**
     * @method setSizeString
     * @description Trunca el string al tamaño definido
     * @param (string) $string
     * @param (int) $size
     * @return (string) $string
     */
    public static function setSizeString($string, $size = 30)
    {
        $sizeText = strlen($string);

        if ($sizeText > $size) {
            $string = mb_substr($string, 0, $size,'UTF-8') . '...';
        }

        return $string;
    }
}
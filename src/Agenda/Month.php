<?php

namespace App\Agenda;

class Month{

    private $month;
    private $year;
    private $months = ["janvier","février","mars","avril","mai","juin","juillet","août","septembre","octobre","novembre","décembre"];

    /**
     * Initialise le mois et l'année de l'agenda
     */
    public function __construct(?int $month=null, ?int $year=null)
    {
        if($year === null){
            $year = date("Y");
        }
        if($month === null){
            $month = date("m");
        }
        $this->year = $year;
        $this->month = $month;
    }

    /**
     * un datetime de la date au format yyyy-mm-dd
     * @return \Datetime
     */
    public function getStart():\Datetime
    {
        return new \Datetime("{$this->year}-{$this->month}-01 ");
    }

    /**
     * retourne une date formatée
     * @return string
     */
    public function format():string
    {
        return $this->months[$this->month-1]." " .$this->year;
    }

    /**
     * nombre de semaines dans le mois
     * @return int
     */
    public function nbWeek():int
    {
        $start = $this->getStart();
        $end = (clone $start)->modify('+1 month -1 day');
        return ($end->format('W') - $start->format('W'))+1;
    }
    /**
     * est-ce que la date est dans le mois
     * @return boolean
     */
    public function isInMonth($date):boolean
    {
        return $this->getStart()->format('Y-m') === $date->format('Y-m');
    }

    public function nbDay():int
    {
        $start = $this->getStart();
        $end = (clone $start)->modify('+1 month -1 day');
        return ($end->format('d') - $start->format('d'));
    }
}
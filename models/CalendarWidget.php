<?php
/**
 *
 * Google Calendar Widget 0.1 for Yii Framework 1.0.10
 * Author: Sergey Dmitriev serge.dmitriev@gmail.com  (http://antirek.org.ru)
 * 
 */
class CalendarWidget extends CWidget
{

	private $provider = "http://www.google.com/calendar/event?action=TEMPLATE";				//url of site Google Calendar
	private $google_imgsrc = "http://www.google.com/calendar/images/ext/gc_button6_ru.gif";	//standard google calendar image

	public $text = null;			//name of event
	public $startdate = null;		//startdate
	public $enddate = null;			//enddate
	public $starttime = null;		//starttime
	public $endtime = null;			//endtime
	public $allday = false;			//allday???
	public $duration = null;		//duration, if is set in hours then enddate&endtime are equal
	public $details = null;			//description of event
	public $location = null;		//location
	public $trp = true;				//is time busy?
	public $sprop = null;			//url of event
	public $sprop_name = null;		//name of events url
	public $imgsrc = null;			//source of img
	public $linktext = null;		//text of link (without img)
	public $linktarget = "_blank";	//anchors target

	public function init()
    {
        // this method is called by CController::beginWidget()

		//convert start time&date to gcalendar format
		$this->startdate = date("Ymd",strtotime($this->startdate));
		$this->starttime = date("His",strtotime($this->starttime));

		//time&date formatting
		if (!$this->allday){				 //if event is not allday
			if($this->duration != null){	//but duration are known, duration must be in hours
				$this->enddate = $this->startdate;
				$this->endtime = date("His",strtotime("+ $this->duration hours",strtotime($this->starttime)));
			}else{				//or we known end date&time
				$this->enddate = date("Ymd",strtotime($this->enddate));
				$this->endtime = date("His",strtotime($this->endtime));
			}
		}else{
			//if event allday, we only must have nextday date in gcalendar format
			$this->enddate = date("Ymd",strtotime("+1 day",strtotime($this->startdate)));
		}

		//text or image link?  if we haven't text for link we use image (custom or standard google)
		if($this->linktext === null){
			$this->imgsrc = ($this->imgsrc != null) ? $this->imgsrc : $this->google_imgsrc;
			$this->linktext = "<img src=\"".$this->imgsrc."\" border=0>";
		}
    }

    public function run()
    {
        // this method is called by CController::endWidget()

		//make url to gcalendar
		$url = $this->provider;
		$url .= "&text=".$this->text;
		//it's special formatter for allday using
		$url .= (!$this->allday) ? "&dates=".$this->startdate."T".$this->starttime."/".$this->enddate."T".$this->endtime : "&dates=".$this->startdate."/".$this->enddate; 
		$url .= "&details=".$this->details;
		$url .= "&location=".$this->location;
		$url .= "&trp=".$this->trp;
		$url .= "&sprop=".$this->sprop;
		$url .= "&sprop:name=".$this->sprop_name;
		
		//make anchor tag
		echo "<a href=\"".$url."\" target=\"".$this->linktarget."\">".$this->linktext."</a>";
    }
}
?>
<?php


/**
 * 
 */
class Message 
{ 
  private $message;
  private $id_expediteur;
  private $id_receveur;
  
  function __construct($message,$id_expediteur,$id_receveur)
  {
    $this->message = $message;
    $this->id_expediteur = $id_expediteur;
    $this->id_receveur = $id_receveur; 
  }


  public function getMessage(){
    return $this->message;
  }

  public function setMessage($message){
    $this->message = $message;
  }

  public function getId_expediteur(){
    return $this->id_expediteur;
  }

  public function setId_expediteur($id_expediteur){
    $this->id_expediteur = $id_expediteur;
  }

  public function getId_receveur(){
    return $this->id_receveur;
  }

  public function printMessage($username){
    $image_url = "https://cdn.pixabay.com/photo/2017/02/23/13/05/profile-2092113_960_720.png";
    //$username = "TITI";
  
  //$message = "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu";


  $text = '
  <div class="message">
    <div class="profile-box" >
       <div class="message-image">
        <img src="'.$image_url.'"/>
      </div>
      <p>'.$username.'</p>
    </div>
    <div class="message-text" style="text-overflow: ellipsis;">
      <p>'.$this->message.'</p>
    </div>
  </div>';
    return $text;
  }



}




?>
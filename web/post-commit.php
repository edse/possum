<?php
if(isset($_REQUEST["payload"])){
  $payload = json_decode($_REQUEST["payload"]);
  $msg = "Repository:\n".$payload->repository->name."\n".$payload->repository->url."\n".$payload->repository->description;
  $msg .= "Before:\n".$payload->before;
  $msg .= "After:\n".$payload->after;
  $msg .= "\nCommits:";
  foreach($payload->commits as $c){
    $msg .= "\n\nURL: ".$c->url;
    $msg .= "\nAuthor: ".$c->author->name." (".$c->author->email.")";
    $msg .= "\nTimestamp: ".$c->timestamp;
    $msg .= "\nMessage: ".$c->message;
  }
  $a = exec('cd ..');
  $msg2 .= "\n\n".exec('git pull');
  mail('emerson.estrella@gmail.com', 'Git Pulled [Possum-cms]', $msg.$msg2);
}
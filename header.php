<?php
$lang_settings = get_option( 'co2_lang_options' );
$lang = $lang_settings["general"];
?>
<!--
                                                                                                    
    s-     `/hdo    /+hddddddh-     s-         -o   sohddh-    -o   s-     `/hdo   `sddddddddddds`  
    MMy  .omMNh-   `Mdosyyyyysyy.  `MMy      -hMh  `MMhsNMMy.-hMh  `MMs  .omMNh-   `oyyyyyhyyyyy/`  
   -MMm.sNMNs-     -MMm      oMMo  -MMm      oMMo  -MMm .yNNdoMMo  -MMm.sNMms-          .yd:        
   /MMssmd+.       /MMs      yMM/  /MMs      yMM/  /MMs   ---yMM/  /MMssmd+.            +MMo        
   .yshdddhhho`    .yshhhhhhhyso`  .y/`      `oo`  .y/`      `oo`  .yshdddhhho`         `+s.        
   /yoyhhhhhhyy+   /yoyhhhhhh/`    /y:       -y+   /y:       -y+   /yoyhhhhhhyy+        -ss         
   NMM`     -NMd   NMM`            NMN`     -NMd   NMN`     -NMd   NMN`     -NMd       `NMN         
  .MMN      +MMs  .MMN            .MMN      +MMs  .MMN      +MMs  .MMN      +MMs       :MMd         
  :Mm+      :mM+  :Mm+             +ysyyyyyyoyo`  :Mm+      :mM+  :Mm+      :mM+       +MMs         
  :/`        `+-  :/`                ohhhhhh/     :/`        `+-  :/`        `+-       .yo`         
                                                                                                    
-->
<!DOCTYPE html>
<html lang="<?= $lang ?>" class="post-id-<?= get_the_ID()?>" style="--vh:1vh;--vw:1vw;--scpad:25vw;--mcpad:5vw;--lcpad:5vw; --landcpad:25vw;">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <?php wp_head() ?>
</head>
<body>
<div id="main-content">
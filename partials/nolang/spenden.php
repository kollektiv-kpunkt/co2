<?php
$lang_settings = get_option( 'co2_lang_options' );
$lang = $lang_settings["general"];
?>

<div class="rnw-widget-container noreveal partial"></div>
<script src="https://tamaro.raisenow.com/sp-schweiz/latest/widget.js"></script>
<script>
window.rnw.tamaro.runWidget('.rnw-widget-container', {
  language: '<?= $lang ?>',
  testMode: false,
  debug: false,
  purposes: ['p1'],
  purposeDetails: {
      p1: {
        stored_campaign_id: 28869669,
      },
    },
    paymentTypes: [
      'onetime',
      //'recurring'
    ],
  translations: {
        de: {
          purposes: {
              p1: 'CO2-Gesetz',
          },
      },
      fr: {
          purposes: {
              p1: 'Loi sur le CO2',
          },
      },
      it: {
          purposes: {
              p1: 'Legge sul CO2',
          },
      }, 
  },
  showStoredCustomerEmailPermission: false,
  paymentFormPrefill: {
      stored_customer_email_permission: true,
      stored_customer_donation_receipt: true,
      stored_customer_country: 'CH',
      stored_sxt_address_source: '1008',
        //stored_sxt_product_id: '1037',
      //stored_hidden_parameter: 'myValue',
    },
    amounts: [
      {
        "if": "paymentType() == onetime",
            "then": [40,100,200,400],
      },
      {
          "if": "recurringInterval() == monthly && paymentType() == recurring",
          "then": [10,20,30,50],
      },
      {
          "if": "recurringInterval() == quarterly && paymentType() == recurring",
          "then": [30,60,90,150],
      },
      {
          "if": "recurringInterval() == semestral && paymentType() == recurring",
          "then": [60,120,180,300],
      },
      {
          "if": "recurringInterval() == yearly && paymentType() == recurring",
          "then": [120,240,360,600],
      },
    ],
    paymentSlipDeliveryTypes: [
    {
        "if": "paymentType() == onetime",
            "then": ['download','mail'],
      },
      {
        "if": "paymentType() == recurring",
            "then": ['mail'],
      },
    ],
    //minimumCustomAmount: [15],
    //allowCustomAmount: true,
    //layout: 'list',
})
</script>

<style>
  :root {
    --tamaro-primary-color: var(--red);
    --tamaro-primary-color__hover: rgba(228,2,45,0.75);
    --tamaro-primary-bg-color: rgba(228,2,45,0.03);
    --tamaro-border-color: var(--grey);
        /*font-size: inherit;*/
    --tamaro-bg-color: var(--white);
    }      
</style>
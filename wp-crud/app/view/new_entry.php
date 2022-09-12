<?php
echo "<h2 class='wqpage_heading'>Contact Management.</h2>";
if(isset($_REQUEST['entryid']) && $_REQUEST['entryid']!='') {
  global $wpdb;
  $data = $wpdb->get_row( "SELECT * FROM `wp_contacts` WHERE id = '".$_REQUEST['entryid']."'" );
?>
  <div class="wrap wqmain_body">
    <h3 class="">Edit Contact Details</h3>
    <div class="wqform_body">
      <form name="update_form" id="update_form">
        <input type="hidden" name="wqentryid" id="wqentryid" value="<?=$_REQUEST['entryid']?>" />
        <div class="wqlabel">Title</div>
        <div class="wqfield">
          <input type="email" class="wqtextfield" name="digi_email" id="digi_email" placeholder="Enter Your Email" value="<?=$data->email?>" />
        </div>
        <div id="digi_email_message" class="wqmessage"></div>

        <div class="wqfield">
          <input type="text" class="wqtextfield" name="digi_fname" id="digi_fname" placeholder="Enter Your First Name" value="<?=$data->first_name?>" />
        </div>
        <div id="digi_fname_message" class="wqmessage"></div>

        <div class="wqfield">
          <input type="text" class="wqtextfield" name="digi_lname" id="digi_lname" placeholder="Enter Your Last Name" value="<?=$data->last_name?>" />
        </div>
        <div id="digi_lname_message" class="wqmessage"></div>

        <div class="wqfield">
          <input type="text" class="wqtextfield" name="digi_pnumber" id="digi_pnumber" placeholder="Enter Your Phone Number" value="<?=$data->phone_number	?>" />
        </div>
        <div id="digi_pno_message" class="wqmessage"></div>

        <div>&nbsp;</div>

        <div class="wqlabel">Address</div>
        <div class="wqfield">
          <textarea name="digi_address" class="wqtextfield" id="digi_address" placeholder="Enter Your Address"><?=$data->address?></textarea>
        </div>
        <div id="digi_address_msg" class="wqmessage"></div>

        <div>&nbsp;</div>

        <div><input type="submit" class="wqsubmit_button" id="wqedit" value="Edit" /></div>
        <div>&nbsp;</div>
        <div class="wqsubmit_message"></div>

      </form>
    </div>
  </div>
<?php
} else {
?>
<div class="wrap wqmain_body">
  <h3 class="">New Contact Details</h3>
  <div class="wqform_body">
    <form name="entry_form" id="entry_form">

      <div class="wqlabel">User Info</div>
      <div class="wqfield">
        <input type="email" class="wqtextfield" name="digi_email" id="digi_email" placeholder="Enter Your Email" value="" />
      </div>
      <div id="digi_email_message" class="wqmessage"></div>

      <div class="wqfield">
        <input type="text" class="wqtextfield" name="digi_fname" id="digi_fname" placeholder="Enter Your First Name" value="" />
      </div>
      <div id="digi_fname_message" class="wqmessage"></div>

      <div class="wqfield">
        <input type="text" class="wqtextfield" name="digi_lname" id="digi_lname" placeholder="Enter Your Last Name" value="" />
      </div>
      <div id="digi_lname_message" class="wqmessage"></div>

      <div class="wqfield">
        <input type="text" class="wqtextfield" name="digi_pnumber" id="digi_pnumber" placeholder="Enter Your Phone Number" value="" />
      </div>
      <div id="digi_pno_message" class="wqmessage"></div>

      <div>&nbsp;</div>

      <div class="wqlabel">Address</div>
      <div class="wqfield">
        <textarea name="digi_address" class="wqtextfield" id="digi_address" placeholder="Enter Your Address"></textarea>
      </div>
      <div id="digi_address_msg" class="wqmessage"></div>

      <div>&nbsp;</div>

      <div><input type="submit" class="wqsubmit_button" id="wqadd" value="Add" /></div>
      <div>&nbsp;</div>
      <div class="wqsubmit_message"></div>

    </form>
  </div>
</div>
<?php } ?>

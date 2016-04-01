<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
<link href="https://www.billegoat.gq/css/bootstrap-datepicker3.min.css" rel="stylesheet" />
 </head>
 <body>

 <?php echo form_open('MAddBill/addManualBill');?>
   
     <label for="billSentDate">Billing Date:</label>
     <input type="text" id="billSentDate" name="billSentDate" placeholder="YYYY-MM-DD" data-provide="datepicker"/>

     <br/>
	 
	<label for="billDueDate">Date Due:</label>
     <input type="text" id="billDueDate" name="billDueDate" placeholder="YYYY-MM-DD" data-provide="datepicker"/>
     <br/>
	 
	 <label for="totalAmt">Total Amount Due ($):</label>
     <input type="text" id="totalAmt" name="totalAmt" placeholder="e.g, 101.20"/>
     <br/>
	 
	 <label for="amtLabel">Type of Payment:</label>
     <input type="text" size="20" id="amtLabel" name="amtLabel"/>
     <br/>
	 
	 <label for="amt">Amount:</label>
     <input type="text" size="20" id="amt" name="amt"/>
     <br/>
	 
	 <label for="billSentDate">Tag:</label>
     <input type="text" size="20" id="tagName" name="tagName"/>
     <br/>
	 
     <input type="submit" value="Add Bill"/>
 <?php echo form_close();?>
 </body>
   <script  src="https://billegoat.gq/js/bootstrap-datepicker.js" />
<script>
$('.datepicker').datepicker({
});
 </script>
</html>
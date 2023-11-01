<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}

</style>
<?php include 'db.php'; ?>

<?php  
//export.php  


$output = '';
if(isset($_POST["report"]))
{
 //$query = "select * from invoice_details";
	$query = "select * from invoice_details inner join vendor ON invoice_details.vendor_id=vendor.vendor_id";
 $result = mysqli_query($connection, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
   <tr>
                                        <th>Invoice Type </th>
                                        <th>Company Name </th>
										 <th>GST</th>
                                        <th>Comments</th>
                                        <th>Invoice No:</th>
                                        <th>Date of Invoice</th>
                                        <th>Invoice Amount</th>
                                        <th>Invoice</th>
                                        <th>PO/WO/Email</th>
                                        <th>Signed Receipt</th>
                                        <th>Proof of Transportation </th>
                                        <th>Eway Bill</th>
                                        <th>IGRN</th>
                                        <th>Payment Details</th>

                                        <th>Date Of Payment</th>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>                 <td>'.$row["invoice_type"].'</td>  
                         <td>'.$row["c_name"].'</td>  
						 <td>'.$row["gst"].'</td>
                         <td>'.$row["comment"].'</td> 
                         <td>'.$row["invoice_no"].'</td>  
                         <td>'.$row["invoice_date"].'</td>  
                         <td>'.$row["invoice_amt"].'</td>  
                       <a href="http://technoriya.co/Vendor_MS/VMS/invoice/'.$row["invoice"].'"></a><td>'.$row["invoice"].'</td>  
                       <a href="http://technoriya.co/Vendor_MS/VMS/invoice/'.$row["po"].'"></a> <td>'.$row["po"].'</td>  
                     <a href="http://technoriya.co/Vendor_MS/VMS/invoice/'.$row["signed_receipt"].'"></a><td>'.$row["signed_receipt"].'</td>  
                        <a href="http://technoriya.co/Vendor_MS/VMS/invoice/'.$row["proof_trans"].'"></a>  <td>'.$row["proof_trans"].'</td>  
                         <a href="http://technoriya.co/Vendor_MS/VMS/invoice/'.$row["eway_bill"].'"></a> <td>'.$row["eway_bill"].'</td>  
                       <a href="http://technoriya.co/Vendor_MS/VMS/invoice/'.$row["IGRN"].'"></a>   <td>'.$row["IGRN"].'</td>  
                       <a href="http://technoriya.co/Vendor_MS/VMS/invoice/'.$row["Payment_details"].'"></a>   <td>'.$row["Payment_details"].'</td>  
                         <td>'.$row["IGRN_date"].'</td>  

                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=upload_details.xls');
  echo $output;
 }
}
?>

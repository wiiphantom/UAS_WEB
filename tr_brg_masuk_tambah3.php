  
<!DOCTYPE html>
<html>
<head>
<head>  
      <title>PHP - Sending multiple forms data through jQuery Ajax</title>  
    <link rel="stylesheet" href="assets/baru/jquery-ui.css">
    <link rel="stylesheet" href="assets/baru/bootstrap.min.css">
    <script src="assets/baru/jquery-1.12.4.js"></script>
    <script src="assets/baru/jquery-ui.js"></script>
</head>

</head>  
    <body>  
        <div class="container">
   <br />
   <br />
   <br />
   <div align="right" style="margin-bottom:5px;">
    <button type="button" name="add" id="add" class="btn btn-success btn-xs">Add</button>
   </div>
   <br />
   <form method="post" id="detail_barang_masuk">
    <div class="table-responsive">
     <table class="table table-striped table-bordered" id="tambah_data">
      <tr>
       <th>ID MASUK</th>
       <th>NAMA BARANG</th>
       <th>QTY</th>
       <th>Details</th>
       <th>Remove</th>
      </tr>
     </table>
    </div>
    <div align="center">
     <input type="submit" name="insert" id="insert" class="btn btn-primary" value="SIMPAN" />
    </div>
   </form>

   <br />
  </div>
  <div id="table_input" title="Tambah Data">
   <div class="form-group">
    <label>ID MASUK</label>
    <input type="text" name="id_masuk" id="id_masuk" class="form-control" />
    <span id="error_id_masuk" class="text-danger"></span>
   </div>
   <div class="form-group">
    <label>Nama Barang</label>
    <input type="text" name="nama_barang" id="nama_barang" class="form-control" />
    <span id="error_nama_barang" class="text-danger"></span>
   </div>
   <div class="form-group">
    <label>QTY</label>
    <input type="text" name="qty" id="qty" class="form-control" />
    <span id="error_qty" class="text-danger"></span>
   </div>
   <div class="form-group" align="center">
    <input type="hidden" name="row_id" id="hidden_row_id" />
    <button type="button" name="save" id="save" class="btn btn-info">Save</button>
   </div>
  </div>
  <div id="action_alert" title="Action">
  </div>
    </body>  
</html> 

<script>  
$(document).ready(function(){ 
 
 var count = 0;

 $('#table_input').dialog({
  autoOpen:false,
  width:400
 });

 $('#add').click(function(){
  $('#table_input').dialog('option', 'title', 'Tambah Data');
  $('#id_masuk').val('');
  $('#nama_barang').val('');
  $('#qty').val('');
  $('#error_id_masuk').text('');
  $('#error_nama_barang').text('');
  $('#error_qty').text('');
  $('#id_masuk').css('border-color', '');
  $('#nama_barang').css('border-color', '');
  $('#qty').css('border-color', '');
  $('#save').text('Save');
  $('#table_input').dialog('open');
 });
$('#save').click(function(){
    var error_id_masuk = '';
    var error_nama_barang = '';
    var error_qty = '';
    var id_masuk = '';
    var nama_barang = '';
    var qty = '';
    if($('#id_masuk').val() == '')
    {
      error_id_masuk = 'data required';
      $('#error_id_masuk').text(error_first_name);
      $('#id_masuk').css('border-color', '#cc0000');
      id_masuk = '';
    }
    else
    {
      error_id_masuk = '';
      $('#error_id_masuk').text(error_id_masuk);
      $('#id_masuk').css('border-color', '');
      id_masuk = $('#id_masuk').val();
    } 
    if($('#nama_barang').val() == '')
    {
      error_nama_barang = 'data required';
      $('#error_nama_barang').text(error_nama_barang);
      $('#nama_barang').css('border-color', '#cc0000');
      nama_barang = '';
    }
    else
    {
      error_nama_barang = '';
      $('#error_nama_barang').text(error_nama_barang);
      $('#nama_barang').css('border-color', '');
      nama_barang = $('#nama_barang').val();
    }
    if($('#qty').val() == '')
    {
      error_qty = 'data required';
      $('#error_qty').text(error_qty);
      $('#qty').css('border-color', '#cc0000');
      qty = '';
    }
    else
    {
      error_qty = '';
      $('#error_qty').text(error_qty);
      $('#qty').css('border-color', '');
      qty = $('#qty').val();
    }
    if(error_id_masuk != '' || error_nama_barang != '' || error_qty != '')
    {
      return false;
    }
    else
    {
      if($('#save').text() == 'Save')
      {
        count = count + 1;
        output = '<tr id="row_'+count+'">';
        output += '<td>'+id_masuk+' <input type="hidden" name="hidden_id_masuk[]" id="id_masuk'+count+'" class="id_masuk" value="'+id_masuk+'" /></td>';
        output += '<td>'+nama_barang+' <input type="hidden" name="hidden_nama_barang[]" id="nama_barang'+count+'" class="nama_barang" value="'+nama_barang+'" /></td>';
        output += '<td>'+qty+' <input type="hidden" name="hidden_qty[]" id="qty'+count+'" value="'+qty+'" /></td>';
        output += '<td><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="'+count+'">View</button></td>';
        output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+count+'">Remove</button></td>';
        output += '</tr>';
        $('#tambah_data').append(output);
      }
      else
      {
        var row_id = $('#hidden_row_id').val();
        output = '<td>'+id_masuk+' <input type="hidden" name="hidden_id_masuk[]" id="id_masuk'+row_id+'" class="id_masuk" value="'+id_masuk+'" /></td>';
        output = '<td>'+nama_barang+' <input type="hidden" name="hidden_nama_barang[]" id="nama_barang'+row_id+'" class="nama_barang" value="'+nama_barang+'" /></td>';
        output += '<td>'+qty+' <input type="hidden" name="hidden_qty[]" id="qty'+row_id+'" value="'+qty+'" /></td>';
        output += '<td><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="'+row_id+'">View</button></td>';
        output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+row_id+'">Remove</button></td>';
        $('#row_'+row_id+'').html(output);
      }

      $('#tambah_data').dialog('close');
    }
  });

  $(document).on('click', '.view_details', function(){
    var row_id = $(this).attr("id");
    var id_masuk = $('#id_masuk'+row_id+'').val();
    var nama_barang = $('#nama_barang'+row_id+'').val();
    var qty = $('#qty'+row_id+'').val();
    $('#id_masuk').val(id_masuk);
    $('#nama_barang').val(nama_barang);
    $('#qty').val(qty);
    $('#save').text('Edit');
    $('#hidden_row_id').val(row_id);
    $('#tambah_data').dialog('option', 'title', 'Edit Data');
    $('#tambah_data').dialog('open');
  });

  $(document).on('click', '.remove_details', function(){
    var row_id = $(this).attr("id");
    if(confirm("Are you sure you want to remove this row data?"))
    {
      $('#row_'+row_id+'').remove();
    }
    else
    {
      return false;
    }
  });

  $('#action_alert').dialog({
    autoOpen:false
  });

  $('#detail_barang_masuk').on('submit', function(event){
    event.preventDefault();
    var count_data = 0;
    $('.id_masuk').each(function(){
      count_data = count_data + 1;
    });
    if(count_data > 0)
    {
      var form_data = $(this).serialize();
      $.ajax({
        url:"tr_barang_tambah2.php",
        method:"POST",
        data:form_data,
        success:function(data)
        {
          $('#detail_barang_masuk').find("tr:gt(0)").remove();
          $('#action_alert').html('<p>Data Inserted Successfully</p>');
          $('#action_alert').dialog('open');
        }
      })
    }
    else
    {
      $('#action_alert').html('<p>Please Add atleast one data</p>');
      $('#action_alert').dialog('open');
    }
  });
  
});  
</script>
<?php
    include "koneksi.php";
    include "excel_reader.php";
    
   
        $type =explode(".",$_FILES['file_excel']['name']);
        
        if (empty($_FILES['file_excel']['name'])) {
            ?>
                <script language="JavaScript">alert('Oops! Please fill all / select file ...');document.location='./';</script>
            <?php
        }
        else if(strtolower(end($type)) !='xls'){
            ?>
                <script>alert('Oops! Please upload only Excel XLS file ...');document.location='./';</script>
            <?php
        }
        
        else{
        $target = basename($_FILES['file_excel']['name']) ;
        move_uploaded_file($_FILES['file_excel']['tmp_name'], $target);
    
        $data    =new Spreadsheet_Excel_Reader($_FILES['file_excel']['name'],false);
    
        $baris = $data->rowcount($sheet_index=0);
    
        for ($i=2; $i<=$baris; $i++){
            $id        =$data->val($i, 1);
            $username    =$data->val($i, 2);
            $password    =md5($data->val($i, 3));
            
            $query = $db->query("INSERT INTO user SET username='$username', password='$password'");        
        }
    
            if(!$query){
                ?>
                    <script> alert('<b>Oops!</b> 404 Error Server.');document.location='./';</script>
                <?php
            }
            else{
                ?>
                    <script>alert('Good! Import Excel XLS file success...');document.location='./';</script>
                <?php
            }
        unlink($_FILES['file_excel']['name']);
        }
    

    ?>

    
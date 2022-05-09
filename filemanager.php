<?php 
 $filemanager = true;






?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard/Filemanager | Buurtparlement</title>

    <?php include_once('inc/head.inc.php'); ?>
</head>
<body id="body-pd" class="bg-light">
    <?php include_once('inc/header.inc.php'); ?>

    <main class="container-fluid">
        <div class="files-grid">
            <!-- Vaste Card om nieuwe files up te loaden -->
            <div class="files-grid-itemUpload">
                <a class="box-upload d-flex justify-content-center align-items-center mb-3 rounded-3" href="fileUpload.php" style="width: 270px; height: 173px;">
                    <input 
                                class="invisible"
                                style="z-index: -1;"
                                type="file" 
                                id="fileUpload"
                                accept=".doc,.docx,.xml,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                </a>
                <p><strong>Nieuw bestand</strong></p>    
            </div>
            <!-- Einde vaste Card -->
            <div class="files-grid-item">
                <a class="bg-white d-flex justify-content-center align-items-center mb-3 rounded-3" href="#" style="width: 270px; height: 173px;">
                    <i class="bx bxs-file-doc bx-xlg" style="color: #495EF9;"></i>
                </a>
                <p>
                    <strong>Verslag 1</strong>
                    <br>
                    <small class="text-muted">3 weken geleden toegevoegd</small>
                </p>  
            </div>


            <div class="files-grid-item">
                <a class="bg-white d-flex justify-content-center align-items-center mb-3 rounded-3" href="#" style="width: 270px; height: 173px;">
                    <i class="bx bxs-file-doc bx-xlg" style="color: #495EF9;"></i>
                </a>
                <p>
                    <strong>Verslag 1</strong>
                    <br>
                    <small class="text-muted">3 weken geleden toegevoegd</small>
                </p>  
            </div>
            <div class="files-grid-item">
                <a class="bg-white d-flex justify-content-center align-items-center mb-3 rounded-3" href="#" style="width: 270px; height: 173px;">
                    <i class="bx bxs-file-doc bx-xlg" style="color: #495EF9;"></i>
                </a>
                <p>
                    <strong>Verslag 1</strong>
                    <br>
                    <small class="text-muted">3 weken geleden toegevoegd</small>
                </p>  
            </div>
        </div>
    </main>

    <?php include_once('inc/footer.inc.php'); ?>
</body>
</html>
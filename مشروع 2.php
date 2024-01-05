<?php  
 
 $conn = mysqli_connect('localhost', 'root', '', 'win'); 
  
 if(!$conn){ 
     echo 'Error: ' . mysqli_connect_error(); 
 } 
  
  
 $firstName =  $_POST['firstName']; 
 $lastName =   $_POST['lastName']; 
 $email =      $_POST['email']; 
  
 if(isset($_POST['submit'])) { 
      //echo $firstName . ' ' . $lastName . ' ' . $email; 
  
      $sql = "INSERT INTO users(firstName, lastName, email) 
      VALUES ('$firstName', '$lastName', '$email')"; 
  
 mysqli_query($conn, $sql); 
  
  
 } 
  
 $sql = 'SELECT * FROM users'; 
 $result = mysqli_query($conn, $sql); 
 $users = mysqli_fetch_all($result, MYSQLI_ASSOC); 
  
  
  
 mysqli_free_result($result); 
 mysqli_close($conn); 
  
 ?> 
  
  
  
  
  
 <!DOCTYPE html> 
 <html lang="en" dir="rtl"> 
 <head> 
     <meta charset="UTF-8"> 
     <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css"> 
  
     <link rel="stylesheet" href="./css/style.css"> 
     <title>Document</title> 
 </head> 
 <body> 
  
 <div class="container"> 
  
  
  
 <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light"> 
     <div class="col-md-5 p-lg-5 mx-auto my-5"> 
       <h1 class="display-4 fw-normal">اربح مع ناصر</h1> 
       <p class="lead fw-normal">باقي على فتح التسجيل</p> 
       <h3 id="countdown"></h3> 
       <p class="lead fw-normal">للسحب على ربح نسخة مجانية من برنامج</p> 
       <a class="btn btn-outline-secondary" href="#">Coming soon</a> 
     </div> 
   </div> 
  
  
 <!-- 
   <ul class="list-group list-group-flush"> 
   <li class="list-group-item">تابع البث المباشر على صفحتي على الفيسبوك بالتاريخ المذكور اعلاه</li> 
   <li class="list-group-item">ساقوم ببث مباشر لمدة ساعة عبارة عن اسئلة واجوبة حرة للجميع</li> 
   <li class="list-group-item">خلال فترة الساعة سيتم فتح صفحة التسجيل هنا حيث ستقوم بتسجيل اسمك وايميلك</li> 
   <li class="list-group-item">بنهاية البث سيتم اختيار اسم واحد من قاعدة البيانات بشكل عشوائي</li> 
   <li class="list-group-item">الرابح سيحصل على نسخة مجانية من برنامج كامتازيا</li> 
 </ul> 
 --> 
  
 <div class="position-relative text-center"> 
     <div class="col-md-5 p-lg-5 mx-auto my-5"> 
  
 <form class="mt-5" action="index.php" method="POST"> 
     <h3>الرجاء ادخل معلوماتك</h3> 
  
   <div class="mb-3"> 
     <label for="exampleInputEmail1" class="form-label">الاسم الاول</label> 
     <input type="text" name="firstName" class="form-control" value="<?php echo $firstName ?>" id="exampleInputEmail1" aria-describedby="emailHelp"> 
     <div id="emailHelp" class="form-text"></div> 
   </div> 
  
   <div class="mb-3"> 
     <label for="exampleInputEmail1" class="form-label">الاسم الاخير</label> 
     <input type="text" name="lastName"  class="form-control" value="<?php echo $lastName ?>" id="exampleInputEmail1" aria-describedby="emailHelp"> 
     <div id="emailHelp" class="form-text"></div> 
   </div> 
  
   <div class="mb-3"> 
     <label for="exampleInputEmail1" class="form-label">البريد الالكتروني</label> 
     <input type="text" name="email" class="form-control" value="<?php echo $email ?>" id="exampleInputEmail1" aria-describedby="emailHelp"> 
     <div id="emailHelp" class="form-text"></div> 
   </div> 
    
   
   <button type="submit" name="submit" class="btn btn-primary">ارسال المعلومات</button> 
 </form> 
 </div> 
   </div> 
  
  
  
  
 <!-- 
  
 <form action="index.php" method="POST"> 
     <input type="text"  id="firstName" placeholder="first name"> 
     <input type="text"  id="lastName" placeholder="last name"> 
     <input type="text"  id="email" placeholder="email"> 
     <input type="submit" name="submit" value="send"> 
 </form> 
  
 --> 
 <div id="cards" class="row mb-5 pb-5"> 
     <button id="winner" type="button">اختيار الرابح</button> 
  
      
  
 <?php foreach($users as $user): ?> 
     <div class="col-sm-6"> 
         <div class="card my-2 bg-light"> 
             <div class="card-body"> 
     <h5 class="card-title"><?php echo htmlspecialchars($user['firstName']) . ' ' . htmlspecialchars($user['lastName']) . '<br> ' . htmlspecialchars($user['email']) ; ?></h5>
 <p class="card-text"><?php echo htmlspecialchars($user['firstName']) . ' ' . htmlspecialchars($user['lastName']) . '<br> ' . htmlspecialchars($user['email']) ; ?></p> 
 </div> 
 </div> 
 </div> 
  
     <?php endforeach; ?> 
 </div> 
  
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script> 
 <script src="./js/script.js"></script> 
      
  
 </body> 
 </html>
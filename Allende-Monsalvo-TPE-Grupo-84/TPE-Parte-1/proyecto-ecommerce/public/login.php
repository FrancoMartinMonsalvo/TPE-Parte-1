<?php

   function renderForm(){
       echo '
           <h2>Login</h2>
           <form method="POST">
               <input type="text" name="email" placeholder="Ingrese su email..."/>
               <input type="password" name="password" placeholder="Ingrese su password..."/>
               <button>Login</button>
       ';
   }

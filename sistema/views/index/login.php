</section>

 <div class="container col-md-6">
 
        <fieldset class="scheduler-border">
               <legend ><img src="assets/imgs/lotus.jpg">
               <span style="color:cadetblue">_________________________________________</span></legend>
               <h2>Iniciar Sesión</h2>

               <p></p>
               <p></p>
               <p></p>
               <p></p>
               <p>Ingrese sus credenciales</p>

        <article class="login-form">               
                   
                        <p></p>
                        <form action="?controller=security&method=login" method="POST">
                            <section class="form-group">


                            <div class="col-auto">
                              
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></div>
                                    </div>
                                    <input type="text" class="form-control"  name="email" id="email"
                                    required
                                     placeholder="usuario o email">
                                </div>
                            </div>

                            </section>
                            <p></p>
                            <section class="form-group">

                            <div class="col-auto">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></div>
                                    </div>
                                    <input type="password"
                                    required
                                     class="form-control"  name="password" id="password" placeholder="contraseña">
                                </div>
                            </div>

                            
                            
                            </section>
                            <section class="form-group">
                               

                                <div class="col-auto">
                                <input type="submit" value="Ingresar" class="btn btn-blue">
                                </div>

                            </section>
                        </form>

                        <?php if(isset($_SESSION['flash']['message'])) echo "<b>".$_SESSION['flash']['message']; ?>

                    </article>
        </fieldset>


 </div>



</section>
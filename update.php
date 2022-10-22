<?php

include "config.php";

    if(isset($_POST['update'])){
        $primeironome = $_POST['primeironome'];
        $ultimonome = $_POST['ultimonome'];
        $id = $_POST['id'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $genero = $_POST['genero'];

        $sql = "UPDATE `cliente`.`usuarios` SET
        `primeironome` = '$primeironome', 
        `ultimonome` = '$ultimonome',
        `email` = '$email',
        `password` = '$password',
        `genero` = '$genero'
        WHERE `id`= '$id' ";

        $result = $conn->query($sql);

        if($result == TRUE){
            echo "Atualizado com sucesso!";
        }else{
            echo "erro:" .$sql."<br>" . $conn->error;
        };
    }

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "SELECT * FROM `cliente`.`usuarios` WHERE `id`='$id'";
    $result = $conn->query($sql);

    if($result->num_rows >0){
        while($row = $result->fetch_assoc()){
            $primeironome = $row['primeironome'];
            $ultimonome = $row['ultimonome'];
            $id = $row['id'];
            $email = $row['email'];
            $password = $row['password'];
            $genero = $row['genero'];
        }
    }
?>


<h2>Formulario de atualização</h2>

<form>
        <fieldset>
            <legend>Informações Pessoais:</legend>
            Primeiro Nome:<br>
            <input type="text" name="primeironome"> value="<?php echo $primeironome;?>>
            <br><br>

            ultimo Nome: <br>
            <input type="text" name="ultimonome"> value="<?php echo $ultimonome;?>
            <br><br>

            E-mail: <br>
            <input type="email" name="email"> value="<?php echo $email;?>
            <br><br>

            Id: <br>
            <input type="number" name="id"> value="<?php echo $id;?>
            <br><br>

            Password: <br>
            <input type="password" name="Password"> value="<?php echo $password;?>
            <br><br>

            Gênero: <br>
            <input type="radio" name="genero" value="Masculino"> Masculino
            <input type="radio" name="genero" value="Feminino"> Feminino
            <input type="radio" name="genero" value="Outros"> Outros
            <br><br>


            <input type="submit" name="submit" value="update">

  
        </fieldset>

    
    </fieldset>
</form>
<?php

  }else{
    header('location:consultar.php');
}

?>
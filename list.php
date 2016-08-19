<?php
include ('head.php');
?>

    <?php
    include('conf/conexao.php');



    $pedidos =  mysqli_query($link, "SELECT funcionarios.nome, dados.recheio
	                                    FROM dados 
                                        INNER JOIN funcionarios
                                        ON dados.func_id = funcionarios.id
                                        WHERE dados.data 
                                        BETWEEN DATE(NOW()) AND CONCAT(DATE(NOW()) , ' 14:30:00')
                                        ORDER BY funcionarios.nome");

    $total= 0;
    ?>
   
    <table class="table table-striped" style="text-align:center;">
        <thead>
            <h2 style="text-align:center;">Lista de Funcionários que pediram pão</h2>

        </thead>
        <tbody style="width: 300px;">
            <?php
			$totalSemRecheio = 0;
			$totalComRecheio = 0;
         while($personas = mysqli_fetch_assoc($pedidos)){ ?>
        <tr>
            <td>
             <?php echo utf8_encode(strtoupper(($personas['nome'])));?>
				- <i>pão 
			<?php			
				if($personas['recheio'] == 1){
					echo "com recheio";
					$totalComRecheio++;
				} else {
					echo "sem recheio";
					$totalSemRecheio++;
				}				
			?>
			</i>
			<td>
		<?php
		$total++;
		}
		?>
    </tr>
    <tr>
        <td style="text-align:left;">
			<p style="font-size:14px;display:block;">
				<strong>Sem Recheio:</strong> <?php echo $totalSemRecheio; ?>
			</p>
			<p style="font-size:14px;display:block;">
				<strong>Com Recheio:</strong> <?php echo $totalComRecheio; ?>			
			</p>
			<p style="font-size:19px;display:block;">
				<strong>Total de Pães:</strong> <?php echo $total; ?>
			</p>
        </td>            
    </tr>
            </tbody>
</table>
    <a href="index.php">Voltar</a>
  <?php include('footer.php'); ?>
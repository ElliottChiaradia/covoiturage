<?php
/* @var $this RidesController */
/* @var $model Ride */

/*$this->breadcrumbs=array(
	'Rides'=>array('index'),
	'Update',
);*/
?>




<!-- Fonction permettant de cacher les champs destinés au retour --> 
<script type="text/javascript">
//document.getElementById("champ_cache").style.display = "none";
 /*
function afficher()
{
	var elements =document.getElementsByClassName("champ_cache");
	for(var i=0;i<elements.length;i++)    {    	elements[i].style.display = "table-row";	}
	
}




 
function cacher()
{
    var elements =document.getElementsByClassName("champ_cache");
	for(var i=0;i<elements.length;i++)
    {
    	elements[i].style.display = "none";
	}
}*/

$(document).ready(
	function() {
		//var date = new Date($('#startDate').val());
		var date1 = $('#startDate').val().split(" ");
		var day1 = date1[0].split("-");
		$('#startDate').val(day1[2]+"."+day1[1]+"."+day1[0]);

		var date2 = $('#endDate').val().split(" ");
		var day2 = date2[0].split("-");
		$('#endDate').val(day2[2]+"."+day2[1]+"."+day2[0]);

	});

</script>


<h1>Mise à jour d'un trajet</h1>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(

	 
	'htmlOptions' => array(
    	'accept-charset' => 'UTF-8'
	),

	'id'=>'ride-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,


)); ?>
	<?php echo $form->errorSummary($ride); ?>
				<table>
					<tr>
						<td>Conducteur</td>
						<td>

							<?php echo $user->prenom." ".$user->nom; ?>
						</td>
					</tr>
					<tr>
						<td><?php echo $form->labelEx($ride,'departuretown_fk', array('label' => 'Lieu de départ')); ?>
						</td>
						<td>
							
							<?php echo $form->dropDownList($ride,'departuretown_fk', CHtml::listData(Town::model()->findAll(array('order'=>'name')),'id', 'name')); ?>
							<?php echo $form->error($ride,'departuretown_fk'); ?>
						</td>
					</tr>
					<tr>
						<td>
							<?php echo $form->labelEx($ride,'arrivaltown_fk', array('label' => 'Lieu d\'arrivé')); ?>
						</td>
						<td>
							<?php echo $form->dropDownList($ride,'arrivaltown_fk', CHtml::listData(Town::model()->findAll(array('order'=>'name')),'id', 'name')); ?>
							<?php echo $form->error($ride,'arrivaltown_fk'); ?>
						</td>
					</tr>
					<tr>
						<td>
							<?php echo $form->labelEx($ride,'departure', array('label' => 'Heure de départ (hh:mm)')); ?>
						</td>
						<td>
							<?php echo $form->timeField($ride,'departure',array('class'=>'input input_r input_pryk','placeholder'=>'08:00')); ?>
							<?php echo $form->error($ride,'departure'); ?>
						</td>
					</tr>
					<tr>
						<td>
							<?php echo $form->labelEx($ride,'arrival', array('label' => 'Heure d\'arrivée (hh:mm)')); ?>
							
						</td>
						<td>
							<?php echo $form->timeField($ride,'arrival',array('class'=>'input input_r input_pryk','placeholder'=>'08:00')); ?> 
							<?php echo $form->error($ride,'arrival'); ?>
						</td>
					</tr>
					<tr>
						<td>
							<?php echo $form->labelEx($ride,'startDate', array('label' => 'Date du trajet')); ?>
							<?php //echo '<input id="startDate" class="hasDatepicker" type="text" value="'.date("d.m.Y",strtotime($ride->startDate)).'" name="Ride[startDate]"></input>'; ?>
						</td>
						<td>
							<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
										'model'=>$ride,
        								'attribute'=>'startDate',
									    'name'=>'startDate',
									    // additional javascript options for the date picker plugin
									    'options'=>array(
									    	'changeMonth'=>'true', 
                    						'changeYear'=>'true', 
									        'showAnim'=>'fadeIn',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
									    	'dateFormat' => 'dd.mm.yy', // date Format
									    	'value'=>date('dd/mm/yy'),
									    ),
									    'htmlOptions'=>array(
									        
									    ),
									));
								?>
							<?php echo $form->error($ride,'startDate'); ?>
						</td>
					</tr>
					<tr>
						<td>
							<?php echo $form->labelEx($ride,'endDate', array('label' => 'Date fin du trajet (récurrence)')); ?>
						</td>
						<td>
							<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
										'model'=>$ride,
        								'attribute'=>'endDate',

									    'name'=>'endDate',
									    // additional javascript options for the date picker plugin
									    'options'=>array(
									        'showAnim'=>'fadeIn', //'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
									        'dateFormat' => 'dd.mm.yy', // Date Format
        									
									    ),
									    'htmlOptions'=>array(
									        
									    ),
									));
								?>
							<?php echo $form->error($ride,'endDate'); ?>
						</td>
					</tr>


					<tr>
						<td>
							<?php echo $form->labelEx($ride,'seats', array('label' => 'Place(s) disponible(s)')); ?>
							
						</td>
						<td>
							<?php echo $form->dropDownList($ride,'seats',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9')); ?>
							<?php echo $form->error($ride,'seats'); ?>
						</td>
					</tr>
					<tr>
						<td>
							<?php echo $form->labelEx($ride,'description', array('label' => 'Description')); ?>
						</td>
						<td>
							<?php echo $form->textArea($ride,'description',array('rows'=>6, 'cols'=>50)); ?>
							<?php echo $form->error($ride,'description'); ?>
						</td>
					</tr>

					<!--<tr>
						<td>
							Voulez-vous créer le trajet retour ?<br/>
							Oui <input type="radio" name="retour" value="oui" id="oui" onClick="afficher();" /> <br />
							Non <input type="radio" name="retour" value="non" id="non" checked="checked" onClick="cacher();"/> <br />
						</td>
						
					</tr>-->
					<?php if($ride->bindedride){ ?>
					<input type="text" hidden name="retour" id="retour" value="oui"/>
					<tr><td><strong>
						<?php if(strtotime($ride->rides->arrival)>strtotime($ride->arrival))
						{echo "Trajet retour";}else{echo "Trajet aller";} ?>
					</strong></td><td></td></tr>
					<tr>
						<td>
							<?php echo $form->labelEx($rideretour,'departure', array('label' => 'Heure de départ (hh:mm)')); ?>
						</td>
						<td>
							<?php echo $form->timeField($rideretour,'departure',array('class'=>'input input_r input_pryk','placeholder'=>'08:00', 'name' => "Ride_retour[departure]")); ?>
							<?php echo $form->error($rideretour,'departure'); ?>
						</td>
					</tr>
					<tr>
						<td>
							<?php echo $form->labelEx($rideretour,'arrival', array('label' => 'Heure d\'arrivée (hh:mm)')); ?>
							
						</td>
						<td>
							<?php echo $form->timeField($rideretour,'arrival',array('class'=>'input input_r input_pryk','placeholder'=>'08:00','name' => "Ride_retour[arrival]" )); ?> 
							<?php echo $form->error($rideretour,'arrival'); ?>
						</td>
					</tr>

					<tr>
						<td>
							<?php echo $form->labelEx($rideretour,'description', array('label' => 'Description')); ?>
						</td>
						<td>
							<?php echo $form->textArea($rideretour,'description',array('rows'=>6, 'cols'=>50, 'name' => "Ride_retour[description]")); ?>
							<?php echo $form->error($rideretour,'description'); ?>
						</td>
					</tr>
					<?php } ?>
					<tr>
						<td>
							<?php echo CHtml::submitButton($ride->isNewRecord ? 'Create' : 'Save'); ?>
						</td>
					</tr>
			</table>
		
<?php $this->endWidget(); ?>
</div>
<script type="text/javascript">
/*
var errors = document.getElementsByClassName('errorMessage');
//console.log(errors[0].parentNode);
for(var i=0; i<errors.length;i++)
{
	if(errors[i].parentNode.parentNode.className=="champ_cache")
	{
		afficher();
		document.getElementById('oui').checked='checked';
	}
}
if($("#Ride_retour_departure").val()!="")
{
	console.log("coucou");
	afficher();
	document.getElementById('oui').checked='checked';
}*/
</script>


<?php 
	$gretting = 'Selamat '.(date('G')<10?'pagi':(date('G')<15?'siang':'sore')) ;

	$ref = file_get_contents('./files/ref.json');
	$ref = json_decode($ref, true);

	$f2f = $ref['f2f'];
	$grandprize = $ref['grandprize'];
	$grandprize_date = $ref['grandprize_date'];
	$sesi_tanya_jawab = $ref['sesi_tanya_jawab'];
?>
<section class="content-header">
	<h1>
		Interview
		<small>Phone script</small>
	</h1>
	<ol class="breadcrumb">
		<li><?php echo anchor('home','<span class="glyphicon glyphicon-home"></span> Home')?></li>
	  <li><?php echo anchor($breadcrumb,'List')?></li>
	  <li class="active">Interview</li>
	</ol>
</section>
<section class="content">
<?php echo $this->session->flashdata('alert')?>
	<div class="row">
		<?php echo form_open($action) ?>
		<div class="col-md-8 col-sm-8">
			<div class="box box-status">
				<div class="box-body form-inline">
					Status : 
					<?php echo form_dropdown('status',$this->interview_model->status_dropdown(),set_value('status',$candidate->status),'class="form-control"') ?>
					<div class="pull-right">
						<div class="checkbox <?php echo ($this->user_login['level']==2?'hide':'') ?>">
							<label>
								<?php echo form_checkbox(array('id'=>'valid','name'=>'valid','value'=>'1','checked'=>set_value('valid',($candidate->valid==1?true:false)))) ?>
								Valid
							</label>
						</div>
						<div class="checkbox <?php echo ($this->user_login['level']==3?'hide':'') ?>">
							<label>
								<?php echo form_checkbox(array('id'=>'audit','name'=>'audit','value'=>'1','checked'=>set_value('audit',($candidate->audit==1?true:false)))) ?>
								Audit
							</label>
						</div>
					</div>
					<button class="btn btn-success btn-sm" type="submit" onclick="return confirm('Are you sure')"><span class="glyphicon glyphicon-save"></span> Save</button>
				</div>	
			</div>	
			<div class="box box-opening">
				<div class="box-header">
					<b>Phone Script</b>
				</div>	
				<div class="box-body">
					<h3>Nomor Telephone : <b><?php echo $candidate->tlp ?></b></h3>
					<h3><?php echo $gretting ?>. Bisa berbicara dengan <b><?php echo $candidate->fullname ?></b> ?</h3>
				</div>	
				<div class="box-footer">
					<div class="checkbox">
						<label>
							<?php echo form_checkbox(array('id'=>'called','name'=>'called','value'=>'1','checked'=>set_value('called',($candidate->called==1?true:false)))) ?>
							Berhasil Dihubungi
						</label>
					</div>
					<p>Jika <b>"tidak ada ditempat"</b> atau <b>"sibuk"</b> : Minta waktu yang tepat untuk dihubungi kembali</p>
				</div>					
			</div>
			<div class="box box-minute hide">
				<div class="box-body">
					<h3>Saya <b><?php echo $this->user_login['name'] ?></b> perwakilan dari Sampoerna A, ingin berbicara dengan Mas/Mbak terkait dengan program Go Ahead Challenge.</h3>
					<h3>Boleh minta waktunya sekitar 15 menit ?</h3>
					<div class="radio">
						<label>
							<?php echo form_radio(array('id'=>'minute1','name'=>'minute','value'=>'1','checked'=>($candidate->minute==1?true:false))) ?>
							Ya
						</label>
					</div>				
					<div class="radio">
						<label>
							<?php echo form_radio(array('id'=>'minute2','name'=>'minute','value'=>'2','checked'=>($candidate->minute==2?true:false))) ?>
							Tidak
						</label>
					</div>				
				</div>				
			</div>
			<div class="box box-minute-tidak box-warning hide">
				<div class="box-body">
	    			<h3>Saya minta maaf sudah menggangu waktunya. Kapan kira kira bisa dihubungi kembali ?</h3>
	    			<p>(catat tgl dan waktu untuk dihubungi)</p>
	    		</div>	
			</div>								
			<div class="box box-smoker hide">
				<div class="box-body">
					<h3>Oke, Terima kasih atas waktunya.</h3>
					<h3><b>Anda terpilih sebagai kandidat pemenang dari program GO AHEAD CHALLENGE 2017 yang berkesempatan memenangkan winners trip ke <?php echo $grandprize; ?>!</b></h3>
					<h3>Apakah Mas/Mbak seorang perokok dewasa dan sudah berumur 18 tahun ?</h3>
					<div class="radio">
						<label>
							<?php echo form_radio(array('id'=>'smoker1','name'=>'smoker','value'=>'1','checked'=>($candidate->smoker==1?true:false))) ?>
							Ya
						</label>
					</div>				
					<div class="radio">
						<label>
							<?php echo form_radio(array('id'=>'smoker2','name'=>'smoker','value'=>'2','checked'=>($candidate->smoker==2?true:false))) ?>
							Tidak
						</label>
					</div>				
				</div>				
			</div>
			<div class="box box-smoker-tidak box-danger hide">
				<div class="box-body">
	    			<h3>Mohon maaf sekali, dengan demikian Anda dianggap gugur dalam program ini karena program ini dikhususkan untuk perokok dewasa.</h3>
	    			<h3><?php echo $gretting ?></h3>
	    		</div>	
			</div>								
			<div class="box box-callagain hide">
				<div class="box-body">
					<h3>Dengan demikian, diharapkan Mas/Mbak dapat menjawab beberapa pertanyaan dari kami.</h3>
					<h3>Jika Mas/Mbak berhasil menjawab seluruh pertanyaan dengan baik,</h3>
					<h3>Maka Mas/Mbak akan kami hubungi kembali untuk mengabarkan apabila Mas/Mbak lolos ke tahapan seleksi berikutnya.</h3>
					<h3>Sebelumnya, saya akan sedikit menggambarkan proses seleksi Go Ahead Challenge atau GAC. Ada 2 tahapan yaitu GAC Festival & GAC Artwarding.</h3>
					<h3>Tahapan setelah ini adalah GAC Festival, yaitu pameran karya yang telah Mas/Mbak kirimkan & face-to-face interview, yang akan diadakan di (sebutkan kota & tanggal).</h3>

					<h3>Jika lolos maka Mas/Mbak akan disertakan dalam acara GAC Artwarding di Jakarta tanggal 3 Des 2017, dimana Mas/Mbak berkesempatan membuat karya kolaboratif dengan para ahli di bidangnya. Selanjutnya akan dipilih pemenang berdasarkan karya terbaik yang berkesempatan pergi & berkarya di Amerika Serikat selama 1 sampai 3 minggu.</h3>					
					<h3>Apakah Mas/Mbak keberatan atau berhalangan ?</h3>
					<div class="radio">
						<label>
							<?php echo form_radio(array('id'=>'callagain1','name'=>'callagain','value'=>'1','checked'=>($candidate->callagain==1?true:false))) ?>
							Tidak Keberatan
						</label>
					</div>				
					<div class="radio">
						<label>
							<?php echo form_radio(array('id'=>'callagain2','name'=>'callagain','value'=>'2','checked'=>($candidate->callagain==2?true:false))) ?>
							Keberatan atau berhalangan
						</label>
					</div>				
				</div>				
			</div>
			<div class="box box-callagain-tidak box-danger hide">
				<div class="box-body">
	    			<h3>Mohon maaf sekali, dengan demikian Anda dianggap gugur dalam program ini, karena face to face interview adalah salah satu syarat untuk dapat memenangkan grand prize Go Ahead Challenge. Terima kasih atas waktunya</h3>
	    			<h3><?php echo $gretting ?></h3>
	    		</div>	
			</div>								
			<div class="box box-verification hide">
				<div class="box-body">
					<h3>Oke, Terima kasih banyak atas ketersediaannya. Sebelumnya, kami akan melakukan verifikasi data terlebih dahulu</h3>
					<table class="table table-striped table-bordered">
						<tr>
							<td><label class="input-sm">Fullname</label></td>
							<td><input name="fullname" maxlength="100" autocomplete="off" class="form-control" value="<?php echo (isset($candidate->fullname)?$candidate->fullname:'') ?>"></td>
						</tr>
						<tr>
							<td><label class="input-sm">Nickname</label></td>
							<td><input name="nickname" maxlength="100" autocomplete="off" class="form-control" value="<?php echo (isset($candidate->nickname)?$candidate->nickname:'') ?>"></td>
						</tr>
						<?php 
							$date = explode("-", $candidate->dob);
						?>
						<tr class="form-inline">
							<td><label class="input-sm">Day of Birth</label></td>
							<td>
								<?php echo form_dropdown('dob_dd',get_dd(),(isset($date[2])?$date[2]:''),'class="form-control"') ?>
								<?php echo form_dropdown('dob_mm',get_mm(),(isset($date[1])?$date[1]:''),'class="form-control"') ?>
								<input name="dob_yy" class="form-control" maxlength="4" size="10" value="<?php echo (isset($date[0])?$date[0]:'') ?>">
							</td>
						</tr>
						<tr>
							<td><label class="input-sm">Kota</label></td>
							<td><input name="city" maxlength="100" autocomplete="off" class="form-control" value="<?php echo (isset($candidate->city)?$candidate->city:'') ?>"></td>
						</tr>
						<tr>
							<td><label class="input-sm">Phone/HP</label></td>
							<td><input name="tlp" maxlength="100" autocomplete="off" class="form-control" value="<?php echo (isset($candidate->tlp)?$candidate->tlp:'') ?>"></td>
						</tr>
						<tr>
							<td><label class="input-sm">Email</label></td>
							<td><input name="email" maxlength="100" autocomplete="off" class="form-control" value="<?php echo (isset($candidate->email)?$candidate->email:'') ?>"></td>
						</tr>
						<tr>
							<td><label class="input-sm">Twitter</label></td>
							<td><input name="tw" maxlength="100" autocomplete="off" class="form-control" value="<?php echo (isset($candidate->tw)?$candidate->tw:'') ?>"></td>
						</tr>
						<tr>
							<td><label class="input-sm">Brand Rokok</label></td>
							<td><input name="brand" maxlength="100" autocomplete="off" class="form-control input-sm" value="<?php echo (isset($candidate->brand)?$candidate->brand:'') ?>"></td>
						</tr>
					</table>
					<h4><b>Sebelumnya kami beritahukan bahwa seluruh pembicaraan yang terjadi di telepon ini akan direkam untuk selanjutnya kami jadikan bahan pertimbangan dalam proses pemilihan pemenang.</b></h4>
					<h4>Perlu kami informasikan bahwa pertanyaan-pertanyaan yang akan kami berikan setelah ini akan lebih menggali informasi lebih jauh mengenai anda.</h4>
					<h4>Pertanyaannya akan dibagi menjadi 4 fokus observasi, </h4>
					<ul>
						<li><h4>Validation (Keaslian & keabsahan karya yang sudah di submit),</h4></li>
						<li><h4>Availability (Kesediaan untuk mengikuti proses selanjutnya & untuk pergi ke luar negeri),</h4></li>
						<li><h4>Interest (Minat serta apa yang akan mereka lakukan apabila memenangkan grand prize)</h4></li>
						<li><h4>Serta English Proficiency (kelancaran berkomunikasi dalam bahasa Inggris)</h4></li>
					</ul>
				</div>				
			</div>
			<div class="box-tanya-jawab-1 hide">
				<div class="alert alert-danger">
					Sesi Tanya Jawab A – Keabsahan karya yang di submit oleh kandidat
				</div>
				<div class="box box-plagiat">
					<div class="box-body">
						<h3>1. Apa karya yang Mas/Mbak submit ke program Go Ahead Challenge dengan judul <b><?php echo $candidate->art_title ?></b> merupakan karya asli anda & bukan plagiat ?</h3>
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'plagiat1','name'=>'plagiat','value'=>'1','checked'=>($candidate->plagiat==1?true:false))) ?>
								Ya
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'plagiat2','name'=>'plagiat','value'=>'2','checked'=>($candidate->plagiat==2?true:false))) ?>
								Tidak
							</label>
						</div>
					</div>				
					<div class="box-footer box-plagiat-ya hide">
						<h3>Mas/Mbak tahu darimana tentang program ini ?</h3>
						<input name="plagiat_desc" maxlength="100" autocomplete="off" class="form-control input-sm" value="<?php echo (isset($candidate->plagiat_desc)?$candidate->plagiat_desc:'') ?>">
					</div>
				</div>
				<div class="box box-plagiat-tidak box-danger hide">
					<div class="box-body">
		    			<h3>Mohon maaf sekali, dengan demikian Anda dianggap gugur dalam program ini, karena persyaratan tersebut adalah salah satu syarat untuk dapat memenangkan grand prize Go Ahead Challenge.</h3>
		    			<h3><?php echo $gretting ?></h3>
		    		</div>	
				</div>
			</div>	
			<div class="box-tanya-jawab-2 hide">
				<div class="box box-art">
					<div class="box-body">
						<h3>2. Boleh tolong di jelaskan mengenai karya anda tersebut ?</h3>
						<textarea name="art_desc" rows="5" autocomplete="off" class="form-control input-sm"><?php echo (isset($candidate->art_desc)?$candidate->art_desc:'') ?></textarea>
						<?php if ($candidate->art_type == "V"): ?>
							<p>Note : tanyakan Dimensi (Ukuran), Media dan Tahun Pembuatan</p>
						<?php elseif($candidate->art_type == "S"): ?>
							<p>Note : Tanyakan juga karyanya dibuat dengan tangan sendiri ataukah kombinasi dengan outsource</p>
						<?php endif ?>
					</div>			
				</div>
				<div class="box box-signature">
					<div class="box-body">
						<h3>3. Apakah anda keberatan apabila harus menandatangani pernyataan tertulis bermaterai bahwa karya anda sah & asli merupakan hasil karya anda serta membawa bukti hasil karya-nya pada tahap selanjutnya apabila dibutuhkan sebagai salah satu persyaratan untuk pemilihan pemenang ?</h3>
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'signature1','name'=>'signature','value'=>'1','checked'=>($candidate->signature==1?true:false))) ?>
								Tidak Keberatan
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'signature2','name'=>'signature','value'=>'2','checked'=>($candidate->signature==2?true:false))) ?>
								Keberatan
							</label>
						</div>				
					</div>				
				</div>							
				<div class="box box-signature-ya hide">
					<div class="box-body">
						<h4>Terima kasih banyak atas semua jawaban dari pertanyaan yang telah kami berikan, semua jawaban dari Mas/ Mbak telah kami rekam dan kami catat.</h4>
						<h4>Setelah ini kami akan melanjutkan ke sesi berikutnya.</h4>
						<h4>Pertanyaan yang akan kami ajukan berikutnya adalah <b>Kesediaan Anda untuk mengikuti proses seleksi</b></h4>
					</div>				
				</div>							
				<div class="box box-signature-tidak box-danger hide">
					<div class="box-body">
						<h3>Mohon maaf sekali, dengan demikian Anda dianggap gugur dalam program ini, karena persyaratan tersebut adalah salah satu syarat untuk dapat memenangkan grand prize Go Ahead Challenge.</h3>
		    			<h3><?php echo $gretting ?></h3>
					</div>				
				</div>	
			</div>	
			<div class="box-tanya-jawab-3 hide">
				<div class="alert alert-danger">
					Sesi Tanya Jawab B – Kesediaan kandidat untuk mengikuti proses seleksi
				</div>
				<div class="box box-facetoface">
					<div class="box-body">
						<h3>1. Apabila Anda terpilih untuk melanjutkan ke tahap seleksi berikutnya, yaitu face-to-face interview di : </h3>
						<?php
							$city_list = $this->interview_model->get_city_list();
							if ($city_list) {
								echo "<ul>";
								foreach ($city_list as $row) {
									echo "<li><b>".$row->city."</b> : ".$row->address.", ".$row->time."</li>";			
								}		
								echo "</ul>";
							}	
						?>
						<h3>Apakah Mas/Mbak bersedia hadir di <?php echo form_dropdown('city_f2f',$this->interview_model->city_f2f_dropdown(),(isset($candidate->city_f2f)?$candidate->city_f2f:''),'id="city_f2f"') ?>?</h3>
						<h3 class="f2f_detail"></h3>
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'facetoface1','name'=>'facetoface','value'=>'1','checked'=>($candidate->facetoface==1?true:false))) ?>
								Ya
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'facetoface2','name'=>'facetoface','value'=>'2','checked'=>($candidate->facetoface==2?true:false))) ?>
								Tidak
							</label>
						</div>				
					</div>				
				</div>							
				<div class="box box-facetoface-tidak box-danger hide">
					<div class="box-body">
						<h3>Mohon maaf sekali, dengan demikian Anda dianggap gugur dalam program ini, karena persyaratan tersebut adalah salah satu syarat untuk dapat memenangkan grand prize Go Ahead Challenge.</h3>
		    			<h3><?php echo $gretting ?></h3>
					</div>				
				</div>							
			</div>	
			<div class="box-tanya-jawab-4 hide">
				<div class="box box-overseas">
					<div class="box-body">
						<h3>2. Kapankah terakhir kali Mas/Mbak bepergian ke luar negeri ?</h3>
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'overseas1','name'=>'overseas','value'=>'1','checked'=>($candidate->overseas==1?true:false))) ?>
								Belum pernah sama sekali
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'overseas2','name'=>'overseas','value'=>'2','checked'=>($candidate->overseas==2?true:false))) ?>
								3 tahun yang lalu
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'overseas2','name'=>'overseas','value'=>'3','checked'=>($candidate->overseas==3?true:false))) ?>
								2 tahun yang lalu
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'overseas2','name'=>'overseas','value'=>'4','checked'=>($candidate->overseas==4?true:false))) ?>
								1 tahun yang lalu
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'overseas2','name'=>'overseas','value'=>'5','checked'=>($candidate->overseas==5?true:false))) ?>
								Kurang lebih 6 bulan yang lalu
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'overseas2','name'=>'overseas','value'=>'6','checked'=>($candidate->overseas==6?true:false))) ?>
								Dalam 3 bulan terakhir ini
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'overseas2','name'=>'overseas','value'=>'7','checked'=>($candidate->overseas==7?true:false))) ?>
								Dalam 1 bulan terakhir ini
							</label>
						</div>				
					</div>				
					<div class="box-footer box-overseas-ya hide">
						<h3>Tujuannya ke : </h3>
						<input name="overseas_desc" maxlength="100" autocomplete="off" class="form-control input-sm" value="<?php echo (isset($candidate->overseas_desc)?$candidate->overseas_desc:'') ?>">
					</div>							
				</div>	
				<div class="box box-visa">
					<div class="box-body">
						<h3>3. Apakah Anda sudah pernah travelling ke Negara yang perlu menggunakan Visa ?</h3>
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'visa1','name'=>'visa','value'=>'1','checked'=>($candidate->visa==1?true:false))) ?>
								Pernah
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'visa2','name'=>'visa','value'=>'2','checked'=>($candidate->visa==2?true:false))) ?>
								Belum Pernah
							</label>
						</div>				
					</div>				
					<div class="box-footer box-visa-ya hide">
						<h3>Sebutkan Negara, Tahun dan Jenis Visanya : </h3>
						<input name="visa_desc" maxlength="200" autocomplete="off" class="form-control input-sm" value="<?php echo (isset($candidate->visa_desc)?$candidate->visa_desc:'') ?>">
						<p>Contoh visa : SCHENGEN, VISA WISATA UMUM, VISA DINAS PEMERINTAHAN, VISA SEKOLAH</p>
					</div>							
				</div>	
				<div class="box box-grandprize">
					<div class="box-body">
						<h3>4. Apabila Anda berhasil memenangkan grand prize berupa kesempatan untuk berangkat & berkarya di <?php echo $grandprize ?>, di <?php echo $grandprize_date ?>, apakah Anda bersedia ?</h3>
						<h3>Apakah Mas/Mbak bersedia ?</h3>
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'grandprize1','name'=>'grandprize','value'=>'1','checked'=>($candidate->grandprize==1?true:false))) ?>
								Ya
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'grandprize2','name'=>'grandprize','value'=>'2','checked'=>($candidate->grandprize==2?true:false))) ?>
								Tidak
							</label>
						</div>				
					</div>

<!-- 					<div class="box-footer" style="background:#222d32;color:#b8c7ce">
						<p><strong>Reward :</strong></p>
						<p>*mengikuti rangkain kegiatan di Jakarta seperti camp bertemu dengan para expert dan berkesempatan untuk berkunjung ke studio seni di Berlin/Amsterdam untuk bertemu dan belajar dari expertise yg ada di Amsterdam</p>

						<p>*Program creators camp berlangsung di Jakarta dan Amsterdam</p>

						<p>Dari tanggal 29 Januari – 15 Februari (17 Hari)</p>
						<p>4 Hari Di Jakarta dan sisanya di Amsterdam</p>

					</div>
 -->					
				</div>							
				<div class="box box-grandprize-tidak box-danger hide">
					<div class="box-body">
						<h3>Mohon maaf sekali, dengan demikian Anda dianggap gugur dalam program ini, karena persyaratan tersebut adalah salah satu syarat untuk dapat memenangkan grand prize Go Ahead Challenge.</h3>
		    			<h3><?php echo $gretting ?></h3>
					</div>				
				</div>							
			</div>	
			<div class="box-tanya-jawab-5 hide">
				<div class="box box-closing-c">
					<div class="box-body">
						<h4>Terima kasih banyak atas semua jawaban dari pertanyaan yang telah Mas/Mbak berikan, semua jawaban dari Mas/Mbak telah kami rekam dan kami catat.</h4>
						<h4>Setelah ini kami akan melanjutkan ke sesi berikutnya.</h4>
						<h4>Pertanyaan yang akan kami ajukan berikutnya adalah <b>Trivia Quiz</b></h4>
					</div>				
				</div>
				<div class="alert alert-danger">
					Sesi Tanya Jawab C – Trivia Quiz
				</div>
				<div class="box box-trivia">
					<div class="box-body">
						<h3>1. Apabila Anda terpilih menjadi pemenang grand prize Go Ahead Challenge ke <?php echo $grandprize ?>, Apakah Anda akan semangat dan excited dalam mengikuti semua kegiatannya ? <b>Go Ahead Experience</b> apa yang akan Anda lakukan ?</h3>
						<textarea name="trivia" rows="5" autocomplete="off" class="form-control input-sm"><?php echo (isset($candidate->trivia)?$candidate->trivia:'') ?></textarea>
					</div>				
				</div>							
				<div class="box box-experience">
					<div class="box-body">
						<h3>2. Apabila anda terpilih menjadi pemenang, experience seperti apa yang anda ingin dapatkan ?</h3>
						<textarea name="experience" rows="5" autocomplete="off" class="form-control input-sm"><?php echo (isset($candidate->experience)?$candidate->experience:'') ?></textarea>
					</div>				
				</div>							
				<div class="box box-closing-c">
					<div class="box-body">
						<h4>Terima kasih banyak atas semua jawaban dari pertanyaan yang telah kami berikan, semua jawaban dari Mas/ Mbak telah kami rekam dan kami catat.</h4>
						<h4>Setelah ini kami akan melanjutkan ke sesi berikutnya.</h4>
						<h4>Pertanyaan yang akan kami ajukan berikutnya adalah <b>mengenai kefasihan kemampuan berbahasa Inggris Anda</b></h4>
					</div>				
				</div>
				<div class="alert alert-danger">
					Sesi Tanya Jawab D – Kemampuan berbahasa Inggris
				</div>
				<div class="box box-english1">
					<div class="box-body">
						<h3>1. What do you know about Sampoerna A Mild Brand ?</h3>
						<small><i>(Apa yang Anda ketahui mengenai Sampoerna A Mild)</i></small>
						<textarea name="english1" rows="5" autocomplete="off" class="form-control input-sm"><?php echo (isset($candidate->english1)?$candidate->english1:'') ?></textarea>
					</div>				
				</div>							
				<div class="box box-english2">
					<div class="box-body">
						<h3>2. What was the most memorable Sampoerna A Mild program that you know ?</h3>
						<small><i>(Apa Program dari Sampoerna A Mild yang paling Anda tahu ?)</i></small>
						<textarea name="english2" rows="5" autocomplete="off" class="form-control input-sm"><?php echo (isset($candidate->english2)?$candidate->english2:'') ?></textarea>
					</div>				
				</div>				
				<div class="box box-english3">
					<div class="box-body">
						<h3>3. How do you know about Go Ahead Challenge Program ?</h3>
						<small><i>(Bagaimana Anda tahu tentang Go Ahead Challenge Program ?)</i></small>
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'english31','name'=>'english3','value'=>'1','checked'=>($candidate->english3==1?true:false))) ?>
								From Friend
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'english32','name'=>'english3','value'=>'2','checked'=>($candidate->english3==2?true:false))) ?>
								From the internet
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'english33','name'=>'english3','value'=>'3','checked'=>($candidate->english3==3?true:false))) ?>
								From the social media
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'english34','name'=>'english3','value'=>'4','checked'=>($candidate->english3==4?true:false))) ?>
								Magazine
							</label>
						</div>				
					</div>				
					<div class="box-footer">
						<p>Nama Billboard, Magazine, Newspaper, Cinema Ad atau yang lainnya</p>
						<input name="english3_desc" maxlength="100" autocomplete="off" class="form-control input-sm" value="<?php echo (isset($candidate->english3_desc)?$candidate->english3_desc:'') ?>">
					</div>							
				</div>	
				<div class="box box-english4">
					<div class="box-body">
						<h3>4. Have you ever been to Sampoerna A Mild events? If yes what was it and why did you go there ?</h3>
						<small><i>(Acara-acara A Mild apa yang pernah Anda datangi ? Alasannya ?)</i></small>
						<textarea name="english4" rows="5" autocomplete="off" class="form-control input-sm"><?php echo (isset($candidate->english4)?$candidate->english4:'') ?></textarea>
					</div>				
				</div>	
				<div class="box box-closing-d">
					<div class="box-body">
						<h4>Terima kasih banyak atas semua jawaban dari pertanyaan yang telah kami berikan.</h4>
						<h4>Proses wawancara sudah hampir selesai.</h4>
						<h4>Namun, kami membutuhkan beberapa data tambahan untuk proses administrasi.</h4>
						<h4><b>Mohon pertanyaan kami berikut ini di konfirmasi :</b></h4>
					</div>				
				</div>
				<div class="box box-passport">
					<div class="box-body">
						<h3>A. Apakah anda memiliki passport ?</h3>
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'passport1','name'=>'passport','value'=>'1','checked'=>($candidate->passport==1?true:false))) ?>
								Ya
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'passport2','name'=>'passport','value'=>'2','checked'=>($candidate->passport==2?true:false))) ?>
								Tidak
							</label>
						</div>				
					</div>				
					<div class="box-footer box-passport-ya hide">
						<table class="table table-striped table-bordered">
							<tr>
								<td><label class="input-sm">Nama Sesuai Passport</label></td>
								<td><input name="passport_name" maxlength="100" autocomplete="off" class="form-control input-sm" value="<?php echo (isset($candidate->passport_name)?$candidate->passport_name:'') ?>"></td>
							</tr>
							<?php 
								$date = explode("-", $candidate->passport_exp);
								if($date[0]=='0000') $date[0] = '';
							?>
							<tr class="form-inline">
								<td><label class="input-sm">Masa Berlaku</label></td>
								<td>
									<?php echo form_dropdown('passport_exp_dd',get_dd(),(isset($date[2])?$date[2]:''),'class="form-control input-sm"') ?>
									<?php echo form_dropdown('passport_exp_mm',get_mm(),(isset($date[1])?$date[1]:''),'class="form-control input-sm"') ?>
									<input name="passport_exp_yy" class="form-control input-sm" maxlength="4" size="10" value="<?php echo (isset($date[0])?$date[0]:'') ?>">
								</td>
							</tr>
						</table>		
					</div>			
				</div>			
				<div class="box box-country">
					<div class="box-body">
						<h3>B. Apakah Anda pernah mengunjungi negara-negara berikut ?</h3>
						<ul>						
							<li>USA</li>
							<li>Uni Eropa (Perancis, Italia, Inggris, Jerman, Belanda, etc)</li>
							<li>Negara-negara di Afrika (Nigeria, Afrika Selatan, Ghana, Mesir, etc)</li>
							<li>Afganistan</li>
							<li>Korea Utara</li>
						</ul>
						<p>Sebutkan :</p>
						<input name="country" maxlength="200" autocomplete="off" class="form-control input-sm" value="<?php echo (isset($candidate->country)?$candidate->country:'') ?>">
					</div>				
				</div>			
				<div class="box box-campaign">
					<div class="box-body">
						<h3>C. Apakah anda sudah pernah mengikuti campaign A Mild atau campaign/program sejenis sebelumnya ?</h3>
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'campaign1','name'=>'campaign','value'=>'1','checked'=>($candidate->campaign==1?true:false))) ?>
								Ya
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'campaign2','name'=>'campaign','value'=>'2','checked'=>($candidate->campaign==2?true:false))) ?>
								Tidak
							</label>
						</div>				
					</div>				
					<div class="box-footer box-campaign-ya hide">
						<h3>Tolong sebutkan nama campaign Sampoerna A Mild yang sudah pernah anda ikuti beserta tahun keikutsertaan anda :</h3>
						<textarea name="campaign_desc" rows="5" autocomplete="off" class="form-control input-sm"><?php echo (isset($candidate->campaign_desc)?$candidate->campaign_desc:'') ?></textarea>
						<small>(Mohon sebutkan nama campaign, waktu campaign berlangsung dan sudah sampai level mana)</small>
					</div>			
				</div>		
				<div class="box box-closing">
					<div class="box-body">
						<h4>Sesi Wawancara via telepon saat ini sudah selesai. Terima kasih banyak atas waktu Mas/Mbak dalam partisipasi aktifnya. Pada tahap ini, sayangnya kandidat belum diperbolehkan untuk mendapatkan sesi tanya – jawab. </h4>
						<h4>Sesi tanya jawab akan diberikan pada saat Anda lolos untuk mengikuti tahap selanjutnya di (area & tanggal GAC Festival). </h4>
						<h4>Mohon tunggu sekitar dua minggu untuk pengumuman semi finalis. Pengumuman semi finalis akan kami beritahukan lewat telepon dan email, sehingga pastikan ponsel Anda aktif pada periode tersebut dan di hari serta jam kerja. </h4>
						<h4>Apabila Anda  memiliki pertanyaan mengenai follow up proses ini silakan email ke <b>info@goaheadpeople.com</b></h4>
						<h4>Sekali lagi, Terima kasih banyak dan kami doakan semoga Anda menjadi salah satu pemenang program Go Ahead Challenge. Have a nice day!</h4>
					</div>			
				</div>
			</div>
		</div>
		<?php echo form_close() ?>
		<div class="col-md-4 col-sm-4">
			<div class="box">
				<div class="box-header">
					<b>Interviewer</b>
				</div>	
				<div class="box-header">
					<td><?php echo $candidate->interviewer ?></td>
				</div>	
			</div>			
			<div class="box callhis-wrap">
				<div class="box-header">
					<b>Call History</b>
				</div>	
				<div class="box-body box-callhis">
					<table class="table table-responsive">
						<tr>
							<th>No</th>
							<th>Date</th>
							<th>Remark</th>
							<th>Action</th>
						</tr>	
						<?php $i=1; ?>
						<?php foreach ($callhis as $row): ?>
						<tr>
							<td><?php echo $i++ ?></td>
							<td><?php echo $row->date ?></td>
							<td data-id="<?php echo $row->id ?>" class="btn-callhis-update"><?php echo $row->status ?></td>
							<td><button type="button" class="btn btn-danger btn-xs btn-callhis-delete" value="<?php echo $row->id ?>">Delete</button></td>
						</tr>							
						<?php endforeach ?>
					</table>
				</div>	
				<div class="box-footer">
					<button type="button" class="btn btn-success btn-xs btn-callhis" value="Answer">Answer</button>
					<button type="button" class="btn btn-warning btn-xs btn-callhis" value="No Answer">No Answer</button>
					<button type="button" class="btn btn-default btn-xs btn-callhis" value="Busy">Busy</button>
					<button type="button" class="btn btn-danger btn-xs btn-callhis" value="Reject">Reject</button>
				</div>	
				<div class="box-footer">
					<input id="note" type="text" name="note" maxlength="100" class="form-control" placeholder="note..." autocomplete="off">
				</div>	
			</div>	
			<div class="box callhis-form hide">
				<div class="box-header">
					<b>Update Call History</b>
				</div>	
				<div class="box-body">
					<input type="hidden" name="id" id="callhis-id" value="5">
					<div class="form-group">
						<?php echo form_label('Date','date',array('class'=>'control-label'))?>
						<?php echo form_input(array('id'=>'callhis-date','name'=>'date','class'=>'form-control input-sm','maxlength'=>'50','autocomplete'=>'off','value'=>set_value('date',''),'required'=>'required'))?>
					</div>
					<div class="form-group">
						<?php echo form_label('Status','status',array('class'=>'control-label'))?>
						<?php echo form_input(array('id'=>'callhis-status','name'=>'status','class'=>'form-control input-sm','maxlength'=>'100','autocomplete'=>'off','value'=>set_value('status',''),'required'=>'required'))?>
					</div>
				</div>	
				<div class="box-footer">
					<button type="button" class="btn btn-success btn-xs btn-callhis-save-update">Save</button>
					<button type="button" class="btn btn-default btn-xs btn-callhis-cancel-update">Cancel</button>
				</div>	
			</div>
		</div>
	</div>	
</section>
<script type="text/javascript" src="<?php echo base_url('assets/js/interview.js') ?>"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#note').keyup(function(e){
	    if(e.keyCode == 13 && $(this).val() != ''){	        
			$.ajax({
				url:'<?php echo base_url() ?>index.php/interview/callhis/create',
				type:'post',
				data:{
					status:$(this).val(),
					candidate:'<?php echo $candidate->id ?>'
				},
				success:function(str){
					$('.box-callhis').html(str);							
				}
			});
			$(this).val('');
	    }else{
			console.log('Note is Emptry');
	    }
	});

	$('.btn-callhis').click(function(){
		$.ajax({
			url:'<?php echo base_url() ?>index.php/interview/callhis/create',
			type:'post',
			data:{
				status:$(this).attr('value'),
				candidate:'<?php echo $candidate->id ?>'
			},
			success:function(str){
				$('.box-callhis').html(str);
			}
		});
	});
	$('body').on('click','.btn-callhis-save-update',function(){
		$('.callhis-form').addClass('hide');
		$.ajax({
			url:'<?php echo base_url() ?>index.php/interview/callhis/update',
			type:'post',
			data:{
				id:$('#callhis-id').val(),
				date:$('#callhis-date').val(),
				status:$('#callhis-status').val(),
				candidate:'<?php echo $candidate->id ?>'
			},
			success:function(str){
				$('.box-callhis').html(str);
			}
		});				
		$('.callhis-wrap').removeClass('hide');		
	});	
	$('body').on('click','.btn-callhis-cancel-update',function(){
		$('.callhis-form').addClass('hide');
		$.ajax({
			url:'<?php echo base_url() ?>index.php/interview/callhis/get/<?php echo $candidate->id ?>',
			type:'post',
			success:function(str){
				$('.box-callhis').html(str);
			}
		});				
		$('.callhis-wrap').removeClass('hide');
	});	
	
	<?php if ($this->user_login['level']<>3): ?>
		$('body').on('click','.btn-callhis-update',function(){
			var date = $(this).parent().children().eq(1).html();
			var status = $(this).parent().children().eq(2).html();
			$('#callhis-id').val($(this).attr('data-id'));
			$('#callhis-date').val(date);
			$('#callhis-status').val(status);
			$('.callhis-form').removeClass('hide');
			$('.callhis-wrap').addClass('hide');
		});		
	<?php endif ?>

	$('body').on('click','.btn-callhis-delete',function(){
		if(confirm('You sure ?')){
			$.ajax({
				url:'<?php echo base_url() ?>index.php/interview/callhis/delete',
				type:'post',
				data:{
					id:$(this).attr('value'),
					candidate:'<?php echo $candidate->id ?>'
				},
				success:function(str){
					$('.box-callhis').html(str);
				}
			});				
		}
	});	
});
</script>
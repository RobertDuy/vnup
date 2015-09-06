<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 
 */

?>

<div class="highlight">
		<div id="s-comment" class="comment">
            <?php
                $args = array(
                   	'post_id'  => get_the_ID(),
                   	'number'   => 5,
                   	'status'   => 'approve',
                ); 
                $comments = get_comments( $args ); //var_dump($comments);
            ?>
			<div class="block-comment">
				<form>
					<div class="form-comment">
						<div class="txt-cmt">
							<div class="Wrapper">
								<h3><span>Bình Luận (<?php echo count($comments);?>)</span></h3>
								<textarea placeholder="Vui lòng nhập tiếng Việt có dấu" cols="1" rows="1" class="cot_txt_content"></textarea>
							</div>
							<div class="Wrapper">
								<p class="warning">Vui lòng nhập nội dung bình luận.</p><a class="button" onclick="openCommentPopup()">Gửi</a>
							</div>
						</div>
					</div>
				</form>

				<!-- List comment -->
                
                <?php if($comments){?>
				<div id="comment_thread">
                    <img src="http://cm.tuoitre.vn/resources/images/loading.gif" id="loading_comment" style="width: 150px; height: 100px; display: none; margin: 0px auto;">
                    <ul class="list-select">
                		<!--li>Xếp theo:  </li>
                		<li><a href="javascript:;" id="select-date" class="option" title="Thời gian">Thời gian</a></li>  |
                		<li class="active"><a href="javascript:;" id="select-like" class="option" title="Số người thích">Số người thích</a></li-->
                	</ul>
                    <div class="lst-comment">
                        
                        <ul>
                        <?php foreach($comments as $comment){?>
                        
                            <li>
				                <dl>
					               <dd>
                						<div class="top">
                							<div class="com-float-l">
                								<a href="javascript:;" title="" class="name"><?php echo $comment->comment_author;?></a>
                								<span class="time"><?php echo  comment_date('d/m/Y  H:i', $comment->comment_ID );;?></span>
                							</div>
                						</div>
						              <p>
							             <?php echo $comment->comment_content; ?>						
                                       </p>
                                        <div class="block-tool">
                							<span class="like_comment_div">
				                                <a href="javascript:;" class="like_btn btn-like-cm" id="like_comment_id-<?php echo $comment->comment_ID;?>">Thích</a>
                                                <input type="hidden" id="comment_layout" value="<?php echo $comment->comment_ID;?>">
                                            </span>
                							<span class="like_number"><?php echo get_comment_like($comment->comment_ID);?></span>
                						</div>
				                    </dd>
		                          </dl>
			
			                     </li>
                        
                        <?php }?>
				            <!--li>
				                <dl>
					               <dd>
                						<div class="top">
                							<div class="com-float-l">
                								<a href="javascript:;" title="" class="name">Bùi Tuấn</a>
                								<span class="time">12:11 17/01/2015</span>
                							</div>
                						</div>
						              <p>
							                 Kết dư còn nhiều nữa trong năm 2015 vì cắt bỏ các loại thuốc đi kèm khi khám bệnh!<br>
                                             Ba tôi khám huyết học từ 16 năm nay! 2015 có "đổi mới": Bệnh viện Huyết Học Tp.HCM 
                                             chỉ bán (vì ba tôi vẫn đồng chi trả mà) mỗi một thuốc về máu! Còn các loại 
                                             xưa nay vẫn kê toa như điều trị Huyết Áp, hỗ trợ thận gan ... xin mời cụ về nơi 
                                             đăng ký khám ban đâu khám và "XIN" kê toa! Nói cho rõ là cụ có giấy chuyển viện 
                                             đàng hoàng nhé! Không tự ý vượt tuyến đâu các bạn! Báo hại con cháu đang năn nỉ 
                                             cụ đi khám tiếp ở Bv Quận! Bó tay với các cụ đang làm ở BHXH hay BHYT! Hình như 
                                             các bác không học Y Khoa mà học ĐH Kinh Tế hay Ngoại Thương nên tính toán quá giỏi! 
                                             Lời thề Bác Sĩ các bác nào có biết nên cần gì! Cứ DƯ LÀ TỐT RỒI! Bao nhiêu người 
                                             bệnh tự chết chứ không phải tại tôi nhé!						
                                       </p>
                                        <div class="block-tool">
                							<span class="like_comment_div">
				                                <a href="javascript:;" class="like_btn btn-like-cm" id="like_comment_id-113457">Thích</a>
                                            </span>
                							<span class="like_number">14</span>
                						</div>
				                    </dd>
		                          </dl>
			
			                     </li>
			                     <li>
				                    <dl>
					                   <dd>
                    						<div class="top">
                    							<div class="com-float-l">
                    								<a href="javascript:;" title="" class="name">Huy Cuong</a>
                    								<span class="time">12:04 17/01/2015</span>
                    							</div>
                    						</div>
    						                  <p>
							                     Năm nào cũng kết dư. Hãy nới lỏng luật để dân được nhờ các bác ơi!	
                                              </p>
    			                             <div class="block-tool">
    							                 <span class="like_comment_div">
    			                                     <a href="javascript:;" class="like_btn btn-like-cm" id="like_comment_id-113453">Thích</a>
    			                                 </span>
                    							<span class="like_number">5</span>
                    						</div>
										</dd>
				                    </dl>
			
			                     </li>
			                     <li>
				                    <dl>
					                   <dd>
                    						<div class="top">
                    							<div class="com-float-l">
                    								<a href="javascript:;" title="" class="name">Thích Linh Toàn </a>
                    								<span class="time">16:01 17/01/2015</span>
                    							</div>
                    						</div>
                    						<p>
                    							Tiền thì dư mà bệnh nhân nghèo mắc bệnh nan y thì lại bị " xiết"?!						
                                            </p>
    			                             <div class="block-tool">
    							                 <span class="like_comment_div">
    												 <a href="javascript:;" class="like_btn btn-like-cm" id="like_comment_id-113618">Thích</a>
    											 </span>
                    							<span class="like_number">2</span>
                    						</div>
										</dd>
				                    </dl>
			                     </li>
			                     <li>
				                    <dl>
					                   <dd>
                    						<div class="top">
                    							<div class="com-float-l">
                    								<a href="javascript:;" title="" class="name">vũ xuân quang</a>
                    								<span class="time">15:06 17/01/2015</span>
                    							</div>
                    						</div>
                    						<p>
                    							Kết dư nhiều nhưng cắt giảm thuốc và dịch vụ BHYT trong khi giá 
                                                khám chữa bệnh, thuốc tăng liên tục. Thật là khổ cho người bệnh!
                    						</p>
				                            <div class="block-tool">
							                     <span class="like_comment_div">
													<a href="javascript:;" class="like_btn btn-like-cm" id="like_comment_id-113564">Thích</a>
												 </span>
							                     <span class="like_number">2</span>
						                    </div>
										</dd>
				                    </dl>
			                     </li-->				
                             </ul>
	                   </div><!-- end lst-comment-->
			     </div><!-- end comment_thread -->
                 <?php }?>
		      </div><!-- block-comment -->
	       </div>
</div>
<div class="cmt_wrapPopup" id="infoForm" >
		<div class="cmt_popup" style="margin-top: -120px;">
			<div class="cmt_centerPopup"> 
				<section>
					<header>
						<h1>Thông tin bạn đọc</h1>
						<a href="javascript:void(0);" title="Đóng" class="cmt_closepp" onclick="closePopup()"></a>
					</header>
					<div class="cmt_content">
						<form method="POST" class="cmt_frm-1" id="frm-comment" action="#">
							<ul>
								<li>
									<label for="cm-email">Email (*)</label><input type="text" id="cmt-email" name="cmt-email" class="cmt_txt-1">
									<p class="cmt_warning email-warning1">Vui lòng nhập email.</p>
									<p class="cmt_warning email-warning2">Email không đúng định dạng.</p>
								</li>
								<li>
									<label for="cm-name">Họ &amp; tên (*)</label><input type="text" id="cmt-name" name="cmt-name" class="cmt_txt-1">
									<p class="cmt_warning name-warning">Vui lòng nhập Họ &amp; Tên.</p>
								</li>
								<li><p>Phần có gắn (*) là thông tin bắt buộc nhập.</p></li>
								<li><input type="button" id="cmt-btn-info" value="Gửi" name="cmt-btn-info" class="cmt_btn-3"></li>
								<input type="hidden" id="cmt-content" name="cmt-content" value="">
								<input type="hidden" id="cmt-otitle" name="cmt-otitle" value="">
								<input type="hidden" id="cmt-cid" name="cmt-cid" value="<?php echo get_the_ID(); ?>">
							</ul>
						</form>
					</div>
				</section>
			</div>
		</div>
</div>
<script>
    function openCommentPopup(){
       var txt_content = $('.cot_txt_content').val();
       if(txt_content == '')
       {
           $('.warning').show();
           return false;
        
       }
       else{
        $('#cmt-content').val(txt_content);
        $('#infoForm').show(600);
       }
    }
    function closePopup(){
        $('#infoForm').hide(600);
    }
    
    
</script>
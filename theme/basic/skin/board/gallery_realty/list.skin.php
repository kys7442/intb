<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

if ($board['bo_use_category']) {
    $category_location = "/bbs/board.php?bo_table=$bo_table&amp;sca=";
}

$g5['title'] = "부동산 정보";
$main_menu = "부동산 정보";
$depth1 = 4;


// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
include_once(G5_THEME_PATH.'/head.php');
?>

<?php include(G5_THEME_PATH.'/sub/sub_common.php')?>

<!-- 게시판 목록 시작 { -->
<div class="subpage borad pt140 mb120" id="bo_gall">
  <div class="container inner_container">
		<h3 class="tits fs_40 fw_800 mb50"><?php echo $g5['title'] ?></h3>
		
		<div class="info_box realty">
			<ul class="dfbox">
				<li class="fs_18 fw_500">공사 매물 부동산</li>
				<li class="fs_18 fw_500">이사 매물 부동산</li>
				<li class="fs_18 fw_500">분양 및 투자 매물 부동산</li>
			</ul>
			<div class="icon"><img src="<?= G5_THEME_IMG_URL; ?>/sub/arrow_ic.png" alt="logo"></div>
			<h4 class="realty_txt fw_700">허위매물 방지 및 부동산 매물과 공사견적을 한 번에 해결!!</h4>
		</div>

		<div class="cate_sch dfbox">
			<!-- 게시판 카테고리 시작 { -->
			<?php if ($is_category) { ?>
			<form name="fcategory" method="get">
			<div class="board_select_box custom_category">
				<select name="sca" onchange="location='<?php echo $category_location ?>'+this.value;" class="frm_input">
						<option value=''>전체</option>
						<?php echo get_category_option($bo_table, $sca); ?>
				</select>
			</div>
			</form>
			<?php } ?>
			<!-- } 게시판 카테고리 끝 -->

			<!-- 게시판 검색 시작 { -->
			<div class="bo_sch_wrap">
					<fieldset class="bo_sch">
							<form name="fsearch" method="get">
							<input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
							<input type="hidden" name="sca" value="<?php echo $sca ?>">
							<input type="hidden" name="sop" value="and">
							<label for="sfl" class="sound_only">검색대상</label>
							<div class="board_select_box">
							<select name="sfl" id="sfl">
									<?php echo get_board_sfl_select_options($sfl); ?>
							</select>
				</div>
							<label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
							<div class="sch_bar">
									<input type="text" name="stx" value="<?php echo stripslashes($stx) ?>" required id="stx" class="sch_input" size="25" maxlength="20" placeholder="검색어를 입력해주세요">
									<button type="submit" value="검색" class="sch_btn"><span class="text">검색</span></button>
							</div>
							</form>
					</fieldset>
			</div>
			<!-- } 게시판 검색 끝 --> 
		</div>

    <form name="fboardlist"  id="fboardlist" action="<?php echo G5_BBS_URL; ?>/board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="sw" value="">


    <?php if ($is_checkbox) { ?>
    <div id="gall_allchk" class="all_chk chk_box">
        <input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);" class="selec_chk">
    	<label for="chkall">
        	<span></span>
        	<b class="sound_only">현재 페이지 게시물 </b> 전체선택
        </label>
    </div>
    <?php } ?>

    <ul id="gall_ul" class="gall_row">
        <?php for ($i=0; $i<count($list); $i++) {

            $classes = array();
            
            $classes[] = 'gall_li';
            $classes[] = 'col-gn-'.$bo_gallery_cols;

            if( $i && ($i % $bo_gallery_cols == 0) ){
                $classes[] = 'box_clear';
            }

            if( $wr_id && $wr_id == $list[$i]['wr_id'] ){
                $classes[] = 'gall_now';
            }
         ?>
        <li class="<?php echo implode(' ', $classes); ?>">
            <div class="gall_box">
                <div class="gall_chk chk_box">
	                <?php if ($is_checkbox) { ?>
					<input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>" class="selec_chk">
	                <label for="chk_wr_id_<?php echo $i ?>">
	                	<span></span>
	                	<b class="sound_only"><?php echo $list[$i]['subject'] ?></b>
	                </label>
	                
	                <?php } ?>
	                <span class="sound_only">
	                    <?php
	                    if ($wr_id == $list[$i]['wr_id'])
	                        echo "<span class=\"bo_current\">열람중</span>";
	                    else
	                        echo $list[$i]['num'];
	                     ?>
	                </span>
                </div>
                <div class="gall_con">
                    <div class="gall_img">
                        <a href="<?php echo $list[$i]['href'] ?>">
                        <?php
                        if ($list[$i]['is_notice']) { // 공지사항  ?>
                            <span class="is_notice">공지</span>
                        <?php } else {
                            $thumb = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $board['bo_gallery_width'], $board['bo_gallery_height'], false, true);

                            if($thumb['src']) {
                                $img_content = '<img src="'.$thumb['src'].'" alt="'.$thumb['alt'].'" >';
                            } else {
                                $img_content = '<span class="no_image">no image</span>';
                            }

                            echo run_replace('thumb_image_tag', $img_content, $thumb);
                        }
                         ?>
                        </a>
                    </div>
										<?php if ($is_category && $list[$i]['ca_name']) { ?>
											<a href="<?php echo $list[$i]['ca_name_href'] ?>" class="bo_cate_link"><?php echo $list[$i]['ca_name'] ?></a>
										<?php } ?>
                    <div class="gall_text_href">
                        <a href="<?php echo $list[$i]['href'] ?>" class="bo_tit fw_600">
                            
                            <?php // echo $list[$i]['icon_reply']; ?>
                        	<!-- 갤러리 댓글기능 사용시 주석을 제거하세요. -->
                        
                            <?php echo $list[$i]['subject'] ?>                      
                            <?php
                            // if ($list[$i]['file']['count']) { echo '<'.$list[$i]['file']['count'].'>'; }
                            if ($list[$i]['icon_new']) echo "<span class=\"new_icon\">N<span class=\"sound_only\">새글</span></span>";
                            if (isset($list[$i]['icon_hot'])) echo rtrim($list[$i]['icon_hot']);
                            //if (isset($list[$i]['icon_file'])) echo rtrim($list[$i]['icon_file']);
                            //if (isset($list[$i]['icon_link'])) echo rtrim($list[$i]['icon_link']);
                            if (isset($list[$i]['icon_secret'])) echo rtrim($list[$i]['icon_secret']);
							?>
							<?php if ($list[$i]['comment_cnt']) { ?><span class="sound_only">댓글</span><span class="cnt_cmt"><?php echo $list[$i]['wr_comment']; ?></span><span class="sound_only">개</span><?php } ?>
                         </a>
                         <span class="bo_cnt"><?php echo utf8_strcut(strip_tags($list[$i]['wr_content']), 72, '...'); ?></span>
												 <span class="wr_date"><?php echo date("Y.m.d", strtotime($list[$i]['wr_datetime']))  ?></span>
                    </div>
                </div>
            </div>
        </li>
        <?php } ?>
        <?php if (count($list) == 0) { echo "<li class=\"empty_list\">게시물이 없습니다.</li>"; } ?>
    </ul>
	
	
     <?php if ($list_href || $is_checkbox || $write_href) { ?>
	 <ul class="btn_bo_user">
        <?php if ($rss_href) { ?><li><a href="<?php echo $rss_href ?>" class="btn_b01 btn" title="RSS"><i class="fa fa-rss" aria-hidden="true"></i><span class="sound_only">RSS</span></a></li><?php } ?>
         <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b01 btn" title="글쓰기">글쓰기</a></li><?php } ?>
       	<?php if ($is_admin == 'super' || $is_auth) {  ?>
		<li><button type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value">선택삭제</button></li>
       	<?php }  ?>
         </ul>
    <?php } ?>  
    </form>

	<!-- 페이지 -->
	<?php echo $write_pages; ?>
	<!-- 페이지 -->

 	

	</div>
</div>

<?php if($is_checkbox) { ?>
<noscript>
<p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
</noscript>
<?php } ?>

<?php if ($is_checkbox) { ?>
<script>
function all_checked(sw) {
    var f = document.fboardlist;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]")
            f.elements[i].checked = sw;
    }
}

function fboardlist_submit(f) {
    var chk_count = 0;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]" && f.elements[i].checked)
            chk_count++;
    }

    if (!chk_count) {
        alert(document.pressed + "할 게시물을 하나 이상 선택하세요.");
        return false;
    }

    if(document.pressed == "선택복사") {
        select_copy("copy");
        return;
    }

    if(document.pressed == "선택이동") {
        select_copy("move");
        return;
    }

    if(document.pressed == "선택삭제") {
        if (!confirm("선택한 게시물을 정말 삭제하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다\n\n답변글이 있는 게시글을 선택하신 경우\n답변글도 선택하셔야 게시글이 삭제됩니다."))
            return false;

        f.removeAttribute("target");
        f.action = g5_bbs_url+"/board_list_update.php";
    }

    return true;
}

// 선택한 게시물 복사 및 이동
function select_copy(sw) {
    var f = document.fboardlist;

    if (sw == 'copy')
        str = "복사";
    else
        str = "이동";

    var sub_win = window.open("", "move", "left=50, top=50, width=500, height=550, scrollbars=1");

    f.sw.value = sw;
    f.target = "move";
    f.action = g5_bbs_url+"/move.php";
    f.submit();
}

// 게시판 리스트 관리자 옵션
jQuery(function($){
    $(".btn_more_opt.is_list_btn").on("click", function(e) {
        e.stopPropagation();
        $(".more_opt.is_list_btn").toggle();
    });
    $(document).on("click", function (e) {
        if(!$(e.target).closest('.is_list_btn').length) {
            $(".more_opt.is_list_btn").hide();
        }
    });
});
</script>
<?php } ?>
<!-- } 게시판 목록 끝 -->
<?php
include_once(G5_THEME_PATH.'/tail.php');
?>
<?php
/*
 *
 *  Template Name: Terms Page
 *
 */

get_header();


$PricerrTheme_adv_code_single_page_above_content = stripslashes(get_option('PricerrTheme_adv_code_single_page_above_content'));
if (!empty($PricerrTheme_adv_code_single_page_above_content)):

  echo '<div class="full_width_a_div">';
  echo $PricerrTheme_adv_code_single_page_above_content;
  echo '</div>';

endif;

if (function_exists('bcn_display')) {
  echo '<div class="my_box3_breadcrumb"><div class="padd10_a">';
  bcn_display();
  echo '</div></div>';
}

if (have_posts()): while (have_posts()) : the_post(); ?>
  <div id="content">
    <div class="box_title"><?php the_title(); ?></div>
    <style>
    <!--
    /* Font Definitions */
    @font-face
    {font-family:Arial;
      panose-1:2 11 6 4 2 2 2 2 2 4;
      mso-font-charset:0;
      mso-generic-font-family:auto;
      mso-font-pitch:variable;
      mso-font-signature:3 0 0 0 1 0;}
    @font-face
    {font-family:Arial;
      panose-1:2 11 6 4 2 2 2 2 2 4;
      mso-font-charset:0;
      mso-generic-font-family:auto;
      mso-font-pitch:variable;
      mso-font-signature:3 0 0 0 1 0;}
    @font-face
    {font-family:Calibri;
      panose-1:2 15 5 2 2 2 4 3 2 4;
      mso-font-charset:0;
      mso-generic-font-family:auto;
      mso-font-pitch:variable;
      mso-font-signature:3 0 0 0 1 0;}
    @font-face
    {font-family:"\30D2\30E9\30AE\30CE\89D2\30B4 Pro W3";
      mso-font-charset:78;
      mso-generic-font-family:auto;
      mso-font-pitch:variable;
      mso-font-signature:-536870145 2059927551 18 0 131085 0;}
    @font-face
    {font-family:Tahoma;
      panose-1:2 11 6 4 3 5 4 4 2 4;
      mso-font-charset:0;
      mso-generic-font-family:auto;
      mso-font-pitch:variable;
      mso-font-signature:-520082689 -1073717157 41 0 66047 0;}
    /* Style Definitions */
    p.MsoNormal, li.MsoNormal, div.MsoNormal
    {mso-style-unhide:no;
      mso-style-qformat:yes;
      mso-style-parent:"";
      margin-top:0cm;
      margin-right:0cm;
      margin-bottom:10.0pt;
      margin-left:0cm;
      line-height:115%;
      mso-pagination:widow-orphan;
      font-size:11.0pt;
      font-family:Calibri;
      mso-ascii-font-family:Calibri;
      mso-ascii-theme-font:minor-latin;
      mso-fareast-font-family:Calibri;
      mso-fareast-theme-font:minor-latin;
      mso-hansi-font-family:Calibri;
      mso-hansi-theme-font:minor-latin;
      mso-bidi-font-family:"Times New Roman";
      mso-bidi-theme-font:minor-bidi;}
    h4
    {mso-style-priority:9;
      mso-style-unhide:no;
      mso-style-qformat:yes;
      mso-style-link:"Heading 4 Char";
      mso-margin-top-alt:auto;
      margin-right:0cm;
      mso-margin-bottom-alt:auto;
      margin-left:0cm;
      mso-pagination:widow-orphan;
      mso-outline-level:4;
      font-size:12.0pt;
      font-family:"Times New Roman";
      mso-fareast-font-family:"Times New Roman";
      mso-bidi-font-family:"Times New Roman";
      font-weight:bold;}
    p.MsoCommentText, li.MsoCommentText, div.MsoCommentText
    {mso-style-noshow:yes;
      mso-style-priority:99;
      mso-style-link:"Comment Text Char";
      margin-top:0cm;
      margin-right:0cm;
      margin-bottom:10.0pt;
      margin-left:0cm;
      mso-pagination:widow-orphan;
      font-size:10.0pt;
      font-family:Calibri;
      mso-ascii-font-family:Calibri;
      mso-ascii-theme-font:minor-latin;
      mso-fareast-font-family:Calibri;
      mso-fareast-theme-font:minor-latin;
      mso-hansi-font-family:Calibri;
      mso-hansi-theme-font:minor-latin;
      mso-bidi-font-family:"Times New Roman";
      mso-bidi-theme-font:minor-bidi;}
    span.MsoCommentReference
    {mso-style-noshow:yes;
      mso-style-priority:99;
      mso-ansi-font-size:8.0pt;
      mso-bidi-font-size:8.0pt;}
    p
    {mso-style-priority:99;
      mso-margin-top-alt:auto;
      margin-right:0cm;
      mso-margin-bottom-alt:auto;
      margin-left:0cm;
      mso-pagination:widow-orphan;
      font-size:12.0pt;
      font-family:"Times New Roman";
      mso-fareast-font-family:"Times New Roman";
      mso-bidi-font-family:"Times New Roman";}
    p.MsoCommentSubject, li.MsoCommentSubject, div.MsoCommentSubject
    {mso-style-noshow:yes;
      mso-style-priority:99;
      mso-style-parent:"Comment Text";
      mso-style-link:"Comment Subject Char";
      mso-style-next:"Comment Text";
      margin-top:0cm;
      margin-right:0cm;
      margin-bottom:10.0pt;
      margin-left:0cm;
      mso-pagination:widow-orphan;
      font-size:10.0pt;
      font-family:Calibri;
      mso-ascii-font-family:Calibri;
      mso-ascii-theme-font:minor-latin;
      mso-fareast-font-family:Calibri;
      mso-fareast-theme-font:minor-latin;
      mso-hansi-font-family:Calibri;
      mso-hansi-theme-font:minor-latin;
      mso-bidi-font-family:"Times New Roman";
      mso-bidi-theme-font:minor-bidi;
      font-weight:bold;}
    p.MsoAcetate, li.MsoAcetate, div.MsoAcetate
    {mso-style-noshow:yes;
      mso-style-priority:99;
      mso-style-link:"Balloon Text Char";
      margin:0cm;
      margin-bottom:.0001pt;
      mso-pagination:widow-orphan;
      font-size:8.0pt;
      font-family:Tahoma;
      mso-fareast-font-family:Calibri;
      mso-fareast-theme-font:minor-latin;}
    p.MsoListParagraph, li.MsoListParagraph, div.MsoListParagraph
    {mso-style-priority:34;
      mso-style-unhide:no;
      mso-style-qformat:yes;
      margin-top:0cm;
      margin-right:0cm;
      margin-bottom:10.0pt;
      margin-left:36.0pt;
      mso-add-space:auto;
      line-height:115%;
      mso-pagination:widow-orphan;
      font-size:11.0pt;
      font-family:Calibri;
      mso-ascii-font-family:Calibri;
      mso-ascii-theme-font:minor-latin;
      mso-fareast-font-family:Calibri;
      mso-fareast-theme-font:minor-latin;
      mso-hansi-font-family:Calibri;
      mso-hansi-theme-font:minor-latin;
      mso-bidi-font-family:"Times New Roman";
      mso-bidi-theme-font:minor-bidi;}
    p.MsoListParagraphCxSpFirst, li.MsoListParagraphCxSpFirst, div.MsoListParagraphCxSpFirst
    {mso-style-priority:34;
      mso-style-unhide:no;
      mso-style-qformat:yes;
      mso-style-type:export-only;
      margin-top:0cm;
      margin-right:0cm;
      margin-bottom:0cm;
      margin-left:36.0pt;
      margin-bottom:.0001pt;
      mso-add-space:auto;
      line-height:115%;
      mso-pagination:widow-orphan;
      font-size:11.0pt;
      font-family:Calibri;
      mso-ascii-font-family:Calibri;
      mso-ascii-theme-font:minor-latin;
      mso-fareast-font-family:Calibri;
      mso-fareast-theme-font:minor-latin;
      mso-hansi-font-family:Calibri;
      mso-hansi-theme-font:minor-latin;
      mso-bidi-font-family:"Times New Roman";
      mso-bidi-theme-font:minor-bidi;}
    p.MsoListParagraphCxSpMiddle, li.MsoListParagraphCxSpMiddle, div.MsoListParagraphCxSpMiddle
    {mso-style-priority:34;
      mso-style-unhide:no;
      mso-style-qformat:yes;
      mso-style-type:export-only;
      margin-top:0cm;
      margin-right:0cm;
      margin-bottom:0cm;
      margin-left:36.0pt;
      margin-bottom:.0001pt;
      mso-add-space:auto;
      line-height:115%;
      mso-pagination:widow-orphan;
      font-size:11.0pt;
      font-family:Calibri;
      mso-ascii-font-family:Calibri;
      mso-ascii-theme-font:minor-latin;
      mso-fareast-font-family:Calibri;
      mso-fareast-theme-font:minor-latin;
      mso-hansi-font-family:Calibri;
      mso-hansi-theme-font:minor-latin;
      mso-bidi-font-family:"Times New Roman";
      mso-bidi-theme-font:minor-bidi;}
    p.MsoListParagraphCxSpLast, li.MsoListParagraphCxSpLast, div.MsoListParagraphCxSpLast
    {mso-style-priority:34;
      mso-style-unhide:no;
      mso-style-qformat:yes;
      mso-style-type:export-only;
      margin-top:0cm;
      margin-right:0cm;
      margin-bottom:10.0pt;
      margin-left:36.0pt;
      mso-add-space:auto;
      line-height:115%;
      mso-pagination:widow-orphan;
      font-size:11.0pt;
      font-family:Calibri;
      mso-ascii-font-family:Calibri;
      mso-ascii-theme-font:minor-latin;
      mso-fareast-font-family:Calibri;
      mso-fareast-theme-font:minor-latin;
      mso-hansi-font-family:Calibri;
      mso-hansi-theme-font:minor-latin;
      mso-bidi-font-family:"Times New Roman";
      mso-bidi-theme-font:minor-bidi;}
    span.apple-converted-space
    {mso-style-name:apple-converted-space;
      mso-style-unhide:no;}
    p.NormalWeb1, li.NormalWeb1, div.NormalWeb1
    {mso-style-name:"Normal \(Web\)1";
      mso-style-unhide:no;
      mso-style-parent:"";
      margin-top:5.0pt;
      margin-right:0cm;
      margin-bottom:5.0pt;
      margin-left:0cm;
      mso-pagination:widow-orphan;
      font-size:12.0pt;
      mso-bidi-font-size:10.0pt;
      font-family:"Times New Roman";
      mso-fareast-font-family:"\30D2\30E9\30AE\30CE\89D2\30B4 Pro W3";
      mso-bidi-font-family:"Times New Roman";
      color:black;}
    span.CommentTextChar
    {mso-style-name:"Comment Text Char";
      mso-style-noshow:yes;
      mso-style-priority:99;
      mso-style-unhide:no;
      mso-style-locked:yes;
      mso-style-link:"Comment Text";
      mso-ansi-font-size:10.0pt;
      mso-bidi-font-size:10.0pt;}
    span.BalloonTextChar
    {mso-style-name:"Balloon Text Char";
      mso-style-noshow:yes;
      mso-style-priority:99;
      mso-style-unhide:no;
      mso-style-locked:yes;
      mso-style-link:"Balloon Text";
      mso-ansi-font-size:8.0pt;
      mso-bidi-font-size:8.0pt;
      font-family:Tahoma;
      mso-ascii-font-family:Tahoma;
      mso-hansi-font-family:Tahoma;
      mso-bidi-font-family:Tahoma;}
    span.Heading4Char
    {mso-style-name:"Heading 4 Char";
      mso-style-priority:9;
      mso-style-unhide:no;
      mso-style-locked:yes;
      mso-style-link:"Heading 4";
      mso-ansi-font-size:12.0pt;
      mso-bidi-font-size:12.0pt;
      font-family:"Times New Roman";
      mso-ascii-font-family:"Times New Roman";
      mso-fareast-font-family:"Times New Roman";
      mso-hansi-font-family:"Times New Roman";
      mso-bidi-font-family:"Times New Roman";
      font-weight:bold;}
    span.CommentSubjectChar
    {mso-style-name:"Comment Subject Char";
      mso-style-noshow:yes;
      mso-style-priority:99;
      mso-style-unhide:no;
      mso-style-locked:yes;
      mso-style-parent:"Comment Text Char";
      mso-style-link:"Comment Subject";
      mso-ansi-font-size:10.0pt;
      mso-bidi-font-size:10.0pt;
      font-weight:bold;}
    span.SpellE
    {mso-style-name:"";
      mso-spl-e:yes;}
    span.GramE
    {mso-style-name:"";
      mso-gram-e:yes;}
    .MsoChpDefault
    {mso-style-type:export-only;
      mso-default-props:yes;
      font-size:11.0pt;
      mso-ansi-font-size:11.0pt;
      mso-bidi-font-size:11.0pt;
      font-family:Calibri;
      mso-ascii-font-family:Calibri;
      mso-ascii-theme-font:minor-latin;
      mso-fareast-font-family:Calibri;
      mso-fareast-theme-font:minor-latin;
      mso-hansi-font-family:Calibri;
      mso-hansi-theme-font:minor-latin;
      mso-bidi-font-family:"Times New Roman";
      mso-bidi-theme-font:minor-bidi;}
    .MsoPapDefault
    {mso-style-type:export-only;
      margin-bottom:10.0pt;
      line-height:115%;}
    @page WordSection1
    {size:612.0pt 792.0pt;
      margin:36.0pt 36.0pt 36.0pt 36.0pt;
      mso-header-margin:36.0pt;
      mso-footer-margin:36.0pt;
      mso-paper-source:0;}
    div.WordSection1
    {page:WordSection1;}
    /* List Definitions */
    @list l0
    {mso-list-id:152531929;
      mso-list-type:hybrid;
      mso-list-template-ids:55072738 -1730512664 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
    @list l0:level1
    {mso-level-number-format:alpha-lower;
      mso-level-text:"\(%1\)";
      mso-level-tab-stop:none;
      mso-level-number-position:left;
      text-indent:-18.0pt;}
    @list l0:level2
    {mso-level-number-format:alpha-lower;
      mso-level-tab-stop:none;
      mso-level-number-position:left;
      text-indent:-18.0pt;}
    @list l0:level3
    {mso-level-number-format:roman-lower;
      mso-level-tab-stop:none;
      mso-level-number-position:right;
      text-indent:-9.0pt;}
    @list l0:level4
    {mso-level-tab-stop:none;
      mso-level-number-position:left;
      text-indent:-18.0pt;}
    @list l0:level5
    {mso-level-number-format:alpha-lower;
      mso-level-tab-stop:none;
      mso-level-number-position:left;
      text-indent:-18.0pt;}
    @list l0:level6
    {mso-level-number-format:roman-lower;
      mso-level-tab-stop:none;
      mso-level-number-position:right;
      text-indent:-9.0pt;}
    @list l0:level7
    {mso-level-tab-stop:none;
      mso-level-number-position:left;
      text-indent:-18.0pt;}
    @list l0:level8
    {mso-level-number-format:alpha-lower;
      mso-level-tab-stop:none;
      mso-level-number-position:left;
      text-indent:-18.0pt;}
    @list l0:level9
    {mso-level-number-format:roman-lower;
      mso-level-tab-stop:none;
      mso-level-number-position:right;
      text-indent:-9.0pt;}
    @list l1
    {mso-list-id:221140824;
      mso-list-type:hybrid;
      mso-list-template-ids:27403038 1047029342 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
    @list l1:level1
    {mso-level-number-format:alpha-lower;
      mso-level-text:"\(%1\)";
      mso-level-tab-stop:none;
      mso-level-number-position:left;
      text-indent:-18.0pt;}
    @list l1:level2
    {mso-level-number-format:alpha-lower;
      mso-level-tab-stop:none;
      mso-level-number-position:left;
      text-indent:-18.0pt;}
    @list l1:level3
    {mso-level-number-format:roman-lower;
      mso-level-tab-stop:none;
      mso-level-number-position:right;
      text-indent:-9.0pt;}
    @list l1:level4
    {mso-level-tab-stop:none;
      mso-level-number-position:left;
      text-indent:-18.0pt;}
    @list l1:level5
    {mso-level-number-format:alpha-lower;
      mso-level-tab-stop:none;
      mso-level-number-position:left;
      text-indent:-18.0pt;}
    @list l1:level6
    {mso-level-number-format:roman-lower;
      mso-level-tab-stop:none;
      mso-level-number-position:right;
      text-indent:-9.0pt;}
    @list l1:level7
    {mso-level-tab-stop:none;
      mso-level-number-position:left;
      text-indent:-18.0pt;}
    @list l1:level8
    {mso-level-number-format:alpha-lower;
      mso-level-tab-stop:none;
      mso-level-number-position:left;
      text-indent:-18.0pt;}
    @list l1:level9
    {mso-level-number-format:roman-lower;
      mso-level-tab-stop:none;
      mso-level-number-position:right;
      text-indent:-9.0pt;}
    @list l2
    {mso-list-id:418645735;
      mso-list-type:hybrid;
      mso-list-template-ids:-522149252 -508363074 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
    @list l2:level1
    {mso-level-number-format:alpha-lower;
      mso-level-text:"\(%1\)";
      mso-level-tab-stop:none;
      mso-level-number-position:left;
      text-indent:-18.0pt;}
    @list l2:level2
    {mso-level-number-format:alpha-lower;
      mso-level-tab-stop:none;
      mso-level-number-position:left;
      text-indent:-18.0pt;}
    @list l2:level3
    {mso-level-number-format:roman-lower;
      mso-level-tab-stop:none;
      mso-level-number-position:right;
      text-indent:-9.0pt;}
    @list l2:level4
    {mso-level-tab-stop:none;
      mso-level-number-position:left;
      text-indent:-18.0pt;}
    @list l2:level5
    {mso-level-number-format:alpha-lower;
      mso-level-tab-stop:none;
      mso-level-number-position:left;
      text-indent:-18.0pt;}
    @list l2:level6
    {mso-level-number-format:roman-lower;
      mso-level-tab-stop:none;
      mso-level-number-position:right;
      text-indent:-9.0pt;}
    @list l2:level7
    {mso-level-tab-stop:none;
      mso-level-number-position:left;
      text-indent:-18.0pt;}
    @list l2:level8
    {mso-level-number-format:alpha-lower;
      mso-level-tab-stop:none;
      mso-level-number-position:left;
      text-indent:-18.0pt;}
    @list l2:level9
    {mso-level-number-format:roman-lower;
      mso-level-tab-stop:none;
      mso-level-number-position:right;
      text-indent:-9.0pt;}
    @list l3
    {mso-list-id:597371582;
      mso-list-type:hybrid;
      mso-list-template-ids:-2038167870 1047029342 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
    @list l3:level1
    {mso-level-number-format:alpha-lower;
      mso-level-text:"\(%1\)";
      mso-level-tab-stop:none;
      mso-level-number-position:left;
      text-indent:-18.0pt;}
    @list l3:level2
    {mso-level-number-format:alpha-lower;
      mso-level-tab-stop:none;
      mso-level-number-position:left;
      text-indent:-18.0pt;}
    @list l3:level3
    {mso-level-number-format:roman-lower;
      mso-level-tab-stop:none;
      mso-level-number-position:right;
      text-indent:-9.0pt;}
    @list l3:level4
    {mso-level-tab-stop:none;
      mso-level-number-position:left;
      text-indent:-18.0pt;}
    @list l3:level5
    {mso-level-number-format:alpha-lower;
      mso-level-tab-stop:none;
      mso-level-number-position:left;
      text-indent:-18.0pt;}
    @list l3:level6
    {mso-level-number-format:roman-lower;
      mso-level-tab-stop:none;
      mso-level-number-position:right;
      text-indent:-9.0pt;}
    @list l3:level7
    {mso-level-tab-stop:none;
      mso-level-number-position:left;
      text-indent:-18.0pt;}
    @list l3:level8
    {mso-level-number-format:alpha-lower;
      mso-level-tab-stop:none;
      mso-level-number-position:left;
      text-indent:-18.0pt;}
    @list l3:level9
    {mso-level-number-format:roman-lower;
      mso-level-tab-stop:none;
      mso-level-number-position:right;
      text-indent:-9.0pt;}
    @list l4
    {mso-list-id:794057568;
      mso-list-template-ids:1374830186;}
    @list l5
    {mso-list-id:1344281358;
      mso-list-type:hybrid;
      mso-list-template-ids:1449678308 1047029342 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
    @list l5:level1
    {mso-level-number-format:alpha-lower;
      mso-level-text:"\(%1\)";
      mso-level-tab-stop:none;
      mso-level-number-position:left;
      text-indent:-18.0pt;}
    @list l5:level2
    {mso-level-number-format:alpha-lower;
      mso-level-tab-stop:none;
      mso-level-number-position:left;
      text-indent:-18.0pt;}
    @list l5:level3
    {mso-level-number-format:roman-lower;
      mso-level-tab-stop:none;
      mso-level-number-position:right;
      text-indent:-9.0pt;}
    @list l5:level4
    {mso-level-tab-stop:none;
      mso-level-number-position:left;
      text-indent:-18.0pt;}
    @list l5:level5
    {mso-level-number-format:alpha-lower;
      mso-level-tab-stop:none;
      mso-level-number-position:left;
      text-indent:-18.0pt;}
    @list l5:level6
    {mso-level-number-format:roman-lower;
      mso-level-tab-stop:none;
      mso-level-number-position:right;
      text-indent:-9.0pt;}
    @list l5:level7
    {mso-level-tab-stop:none;
      mso-level-number-position:left;
      text-indent:-18.0pt;}
    @list l5:level8
    {mso-level-number-format:alpha-lower;
      mso-level-tab-stop:none;
      mso-level-number-position:left;
      text-indent:-18.0pt;}
    @list l5:level9
    {mso-level-number-format:roman-lower;
      mso-level-tab-stop:none;
      mso-level-number-position:right;
      text-indent:-9.0pt;}
    ol
    {margin-bottom:0cm;}
    ul
    {margin-bottom:0cm;}
    -->
    </style>
    <!--[if gte mso 10]>
    <style>
      /* Style Definitions */
      table.MsoNormalTable
      {mso-style-name:"Table Normal";
        mso-tstyle-rowband-size:0;
        mso-tstyle-colband-size:0;
        mso-style-noshow:yes;
        mso-style-priority:99;
        mso-style-parent:"";
        mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
        mso-para-margin-top:0cm;
        mso-para-margin-right:0cm;
        mso-para-margin-bottom:10.0pt;
        mso-para-margin-left:0cm;
        line-height:115%;
        mso-pagination:widow-orphan;
        font-size:11.0pt;
        font-family:Calibri;
        mso-ascii-font-family:Calibri;
        mso-ascii-theme-font:minor-latin;
        mso-hansi-font-family:Calibri;
        mso-hansi-theme-font:minor-latin;}
    </style>
    <![endif]--><!--[if gte mso 9]><xml>
      <o:shapedefaults v:ext="edit" spidmax="1027"/>
    </xml><![endif]--><!--[if gte mso 9]><xml>
      <o:shapelayout v:ext="edit">
        <o:idmap v:ext="edit" data="1"/>
      </o:shapelayout></xml><![endif]-->
    <div class=WordSection1>

    <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
text-align:center;line-height:normal'><b style='mso-bidi-font-weight:normal'><span
          style='font-size:13.0pt;font-family:Arial;mso-bidi-font-family:Arial'><span
            style="mso-spacerun:yes">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>TERMS OF USE <o:p></o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></p>

    <table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0
           style='margin-left:5.4pt;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-padding-alt:0cm 5.4pt 0cm 5.4pt'>
      <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes;
  height:6.0pt'>
        <td width=459 valign=top style='width:459.0pt;border:none;border-top:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:6.0pt'>
          <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:Arial;mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></p>
        </td>
      </tr>
    </table>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial'>Welcome to <span
          style='color:black;mso-themecolor:text1'>campuslessons.com</span> and thank you
for using <span style='color:black;mso-themecolor:text1'>Activethree, LLC </span>services.
<o:p></o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial;color:black;
mso-themecolor:text1'>Campuslessons.com </span><span style='font-family:Arial;
mso-bidi-font-family:Arial'>aims to provide you student interactive services<span
          style=''>. </span>When you use <span style='color:black;
mso-themecolor:text1'>campuslessons.com </span>and/or <span style='color:black;
mso-themecolor:text1'>Activethree, LLC</span><span style='color:red'> </span>Services,
you are transacting with students of <span style=''>the
University of California, San Diego ("UCSD") for which UCSD students and
members of the community may receive any of the listed services on <span
            style='color:black;mso-themecolor:text1'>[campuslessons.com]</span></span><span
          style='color:black;mso-themecolor:text1'>. </span>The Services offered on <span
          style='color:black;mso-themecolor:text1'>[campuslessons.com] </span>are subject
to the following Terms of Use.<o:p></o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial'>By using <span
          style='color:black;mso-themecolor:text1'>Activethree, LLC </span>Services, you
agree to the following TOU. Please read them carefully.<o:p></o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial;color:black;
mso-themecolor:text1'>Campuslesson.com </span><span style='font-family:Arial;
mso-bidi-font-family:Arial'>provides various Services, and <span class=GramE>sometimes
additional</span> terms or service requirements may apply. Any added terms will
become part of your agreement with <span style='color:black;mso-themecolor:
text1'>Activethree, LLC </span>if you decide or happen to use such services.<o:p></o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial'>ELIGIBILITY</span></strong><span style='font-family:
Arial;mso-bidi-font-family:Arial;color:red'> </span><b style='mso-bidi-font-weight:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial'><o:p></o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial'>Age<o:p></o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial;'>By registering to use </span><span style='font-family:Arial;mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'>Activethree, LLC</span><span
        style='font-family:Arial;mso-bidi-font-family:Arial;color:red;'>
</span><span style='font-family:Arial;mso-bidi-font-family:Arial;'>Services and </span><span style='font-family:Arial;mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'>campuslessons.com</span><span
        style='font-family:Arial;mso-bidi-font-family:Arial;'>, you
represent that you are at least 16 years of age. Persons who are at least 16
years of age but under the age of 18 may only use </span><span
        style='font-family:Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:
text1'>campuslessons.com</span><span style='font-family:Arial;mso-bidi-font-family:
Arial;'> with legal parental or guardian consent. Accordingly,
you agree that you are at least 18 years of age or older or possess legal
parental or guardian consent, and have the right, authority and capacity to
enter into and abide by these Terms of Use. <o:p></o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial;'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial;'>Student<o:p></o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial;color:black;
mso-themecolor:text1;'>To provide </span><span
        style='font-family:Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:
text1'>Activethree, LLC<span style=''> Services from Members of
</span>campuslessons.com<span style=''>, you must be a current
student of UCSD and possess a UCSD Student email address to register on </span>campuslessons.com<span
          style=''> and to be allowed to provide </span>Activethree<span
          class=GramE>,LLC</span><span style=''> Services. <o:p></o:p></span></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial;'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial;'>Criminal History<o:p></o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial;color:black;
mso-themecolor:text1;'>If you request to use, register to use,
and/or become a Member of </span><span style='font-family:Arial;mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'>campuslessons.com<span
          style=''>, you further represent and warrant that you have
never been convicted of a felony and/or not required to register as a sex
offender with any government entity. <o:p></o:p></span></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial;'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial;color:black;
mso-themecolor:text1'>Activethree, LLC<strong><span style='font-family:Arial;
;font-weight:normal;mso-bidi-font-weight:bold'> DOES NOT
CURRENTLY CONDUCT CRIMINAL BACKGROUND SCREENINGS ON ITS MEMBERS. </span></strong>Activethree,
LLC<strong><span style='font-family:Arial;;font-weight:normal;
mso-bidi-font-weight:bold'> DOES RESERVE THE RIGHT TO CONDUCT ANY CRIMINAL
BACKGROUND CHECK OR OTHER SCREENINGS (SUCH AS SEX OFFENDER REGISTER SEARCHES),
AT ANY TIME AND USING AVAILABLE PUBLIC RECORDS. BY AGREEING TO THESE TERMS OF
USE, YOU CONSENT TO ANY SUCH CHECK.</span></strong><span style='mso-bidi-font-weight:bold'><o:p></o:p></span></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial'>PRIVACY<o:p></o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial'>Please
review <span style='color:black;mso-themecolor:text1'>Activethree, LLCÕs</span><span
          style='color:red'> </span><u><span style='color:black;mso-themecolor:text1'>Privacy
Policy</span></u><span style='color:#1F497D;mso-themecolor:text2'> [<i
            style='mso-bidi-font-style:normal'>hyperlink Privacy Policy</i>]</span>, which governs
your use of <span style='color:black;mso-themecolor:text1'>Activethree, LLC
Services. To help you understand our practices, our Privacy Policy discloses
and describes to you how your personal data is collected and used, and how your
privacy is protected when you use Activethree, LLC Services. When using Activethree,
LLC services, you agree that Activethree, LLC can use the information you
provide in accordance with our privacy policies.<o:p></o:p></span></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial'>ACCOUNT SECURITY <o:p></o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial;'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial;'>Confidentiality <o:p></o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial;'>Your account is for your personal use only. You may not authorize others
to have access to your account and/or assign or transfer your account to any
other person or entity. You agree that when using </span><span
        style='font-family:Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:
text1'>campuslessons.com</span><span style='font-family:Arial;mso-bidi-font-family:
Arial;'>, you are responsible for safeguarding the
confidentiality of your account and password and for restricting access to your
computer. You further agree to accept responsibility for all activities that
occur under your account or password.<span class=apple-converted-space>&nbsp;</span></span><b
        style='mso-bidi-font-weight:normal'><span style='font-family:Arial;mso-bidi-font-family:
Arial'><o:p></o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial;'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial;'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial;'>Usage<o:p></o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-fareast-font-family:"Times New Roman";
mso-bidi-font-family:Arial;color:red'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial;color:black;
mso-themecolor:text1'>Campuslessons.com</span><span style='font-family:Arial;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1'> and </span><span style='font-family:Arial;
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>Activethree, LLC</span><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'> Service is solely for personal use. </span><span
        style='font-family:Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:
text1;'>As a Member of </span><span style='font-family:Arial;
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>campuslessons.com<span
          style=''>, you agree not to:<o:p></o:p></span></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial;'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoListParagraphCxSpFirst style='margin-bottom:0cm;margin-bottom:.0001pt;
mso-add-space:auto;text-indent:-18.0pt;line-height:normal;mso-list:l0 level1 lfo6'><![if !supportLists]><span
        style='font-family:Arial;mso-fareast-font-family:Arial;mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'><span style='mso-list:Ignore'>(a)<span
            style='font:7.0pt "Times New Roman"'>&nbsp; </span></span></span><![endif]><span
        class=GramE><span style='font-family:Arial;mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1;'>collect</span></span><span
        style='font-family:Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:
text1;'> other MembersÕ personal and/or contact information<o:p></o:p></span></p>

    <p class=MsoListParagraphCxSpMiddle style='margin-bottom:0cm;margin-bottom:
.0001pt;mso-add-space:auto;line-height:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1;'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoListParagraphCxSpLast style='margin-bottom:0cm;margin-bottom:.0001pt;
mso-add-space:auto;text-indent:-18.0pt;line-height:normal;mso-list:l0 level1 lfo6'><![if !supportLists]><span
        style='font-family:Arial;mso-fareast-font-family:Arial;mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'><span style='mso-list:Ignore'>(b)<span
            style='font:7.0pt "Times New Roman"'>&nbsp; </span></span></span><![endif]><span
        class=GramE><span style='font-family:Arial;mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1;'>use</span></span><span
        style='font-family:Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:
text1;'> or provide software, except for general purpose web
browsers and software expressly licensed by us, or services that interact or
interoperate with </span><span style='font-family:Arial;mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'>campuslessons.com<span
          style=''>.<o:p></o:p></span></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial;color:black;
mso-themecolor:text1;'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoListParagraphCxSpFirst style='margin-bottom:0cm;margin-bottom:.0001pt;
mso-add-space:auto;text-indent:-18.0pt;line-height:normal;mso-list:l0 level1 lfo6'><![if !supportLists]><span
        style='font-family:Arial;mso-fareast-font-family:Arial;mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'><span style='mso-list:Ignore'>(c)<span
            style='font:7.0pt "Times New Roman"'>&nbsp; </span></span></span><![endif]><span
        class=GramE><span style='font-family:Arial;mso-fareast-font-family:"Times New Roman";
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>use</span></span><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'> </span><span style='font-family:Arial;
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>Activethree, LLC</span><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'> Service in connection with any
commercial endeavors, such as (<span class=SpellE>i</span>) advertising or
soliciting any user to buy or sell any products or services not offered by </span><span
        style='font-family:Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:
text1'>Activethree, LLC</span><span style='font-family:Arial;mso-fareast-font-family:
"Times New Roman";mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>
or (ii) soliciting others to attend parties or other social functions, or
networking, for commercial purposes. </span><span style='font-family:Arial;
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1;'><o:p></o:p></span></p>

    <p class=MsoListParagraphCxSpMiddle><span style='font-family:Arial;mso-fareast-font-family:
"Times New Roman";mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoListParagraphCxSpMiddle style='margin-bottom:0cm;margin-bottom:
.0001pt;mso-add-space:auto;text-indent:-18.0pt;line-height:normal;mso-list:
l0 level1 lfo6'><![if !supportLists]><span style='font-family:Arial;mso-fareast-font-family:
Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'><span
          style='mso-list:Ignore'>(d)<span style='font:7.0pt "Times New Roman"'>&nbsp; </span></span></span><![endif]><span
        class=GramE><span style='font-family:Arial;mso-fareast-font-family:"Times New Roman";
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>use</span></span><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'> any information obtained from </span><span
        style='font-family:Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:
text1'>Activethree, LLC</span><span style='font-family:Arial;mso-fareast-font-family:
"Times New Roman";mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>
Service to contact, advertise to, solicit, or sell to any other user without
his or her prior express consent. </span><span style='font-family:Arial;
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1;'><o:p></o:p></span></p>

    <p class=MsoListParagraphCxSpLast><span style='font-family:Arial;mso-fareast-font-family:
"Times New Roman";mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-fareast-font-family:"Times New Roman";
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>Organizations,
companies, and/or businesses may not use </span><span style='font-family:Arial;
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>Activethree, LLC</span><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'> Service or </span><span
        style='font-family:Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:
text1'>campuslessons.com</span><span style='font-family:Arial;mso-fareast-font-family:
"Times New Roman";mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>
for any purpose. <o:p></o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-fareast-font-family:"Times New Roman";
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial;color:black;
mso-themecolor:text1'>Activethree, LLC</span><span style='font-family:Arial;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1'> may investigate and take any available legal
action in response to illegal and/or unauthorized uses of </span><span
        style='font-family:Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:
text1'>campuslessons.com</span><span style='font-family:Arial;mso-fareast-font-family:
"Times New Roman";mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>,
including collecting usernames and/or email addresses of members by electronic
or other means for the purpose of sending unsolicited email and unauthorized
framing of or linking to the Website.</span><span style='font-family:Arial;
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1;'><o:p></o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial'>ELECTRONIC COMMUNICATIONS<o:p></o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial;color:black;
mso-themecolor:text1;'>When you use any </span><span
        style='font-family:Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:
text1'>Activethree, LLC<span style=''> Service or send e-mails
to us, you are communicating with us electronically. You consent to receive
electronic communications from us. </span>Activethree, LLC<span
          style=''> communications with you will be by e-mail or by
posting notices on this site. You agree that all agreements, notices,
disclosures and other communications that we electronically provide to you
satisfy any legal requirement that such communications be in writing.</span><o:p></o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial'>NOTICE<o:p></o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial;color:black;
mso-themecolor:text1;'>You consent that </span><span
        style='font-family:Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:
text1'>Activethree, LLC<span style=''> may provide you with
notices, including those regarding changes to this Agreement or reminders of
upcoming Member services, using any reasonable means now known or hereafter
developed, including by email, regular mail, SMS, MMS, text message or postings
on </span>campuslessons.com<span style=''>. Such notices may
not be received if you violate this Agreement by using </span>Activethree, LLC<span
          style=''> Service in an unauthorized manner. You agree that you
are deemed to have received any and all notices that would have been delivered
had you used </span>Activethree, LLC<span style=''> Service in
an authorized manner.<o:p></o:p></span></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial'>COPYRIGHT<o:p></o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial;color:black;
mso-themecolor:text1'>Activethree, LLC retains all right, titles and interest
in and to campuslessons.com, the Application and Services, including all
related intellectual property contained therein. <span style=''><span
            style="mso-spacerun:yes">&nbsp;</span>All content and compilation of all
content included in or made available through any </span>Activethree, LLC<span
          style=''> Service, such as text, graphics, logos, videos, user
interfaces, visual interfaces, button icons, images, photographs, artwork,
audio clips, sounds, digital downloads, computer codes and data compilations is
the property of </span>Activethree, LLC<span style=''> or its
content suppliers and protected by United States and international copyright
laws. You are prohibited from copying, reproducing, republishing, distributing
the content provided on </span>campuslessons.com<span style=''>.
<o:p></o:p></span></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial;color:black;
mso-themecolor:text1;'><o:p>&nbsp;</o:p></span></p>

    <p class=NormalWeb1 style='margin:0cm;margin-bottom:.0001pt;text-align:justify'><span
        style='font-size:11.0pt;mso-bidi-font-size:10.0pt;font-family:Arial;mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'>If you believe that one of our users
is, through the use of </span><span style='font-size:11.0pt;font-family:Arial;
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>campuslessons.com</span><span
        style='font-size:11.0pt;mso-bidi-font-size:10.0pt;font-family:Arial;mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'>, unlawfully infringing the
copyright(s) in a work, and you wish to have the allegedly infringing material
removed, the following information in the form of a written notification
(pursuant to 17 U.S.C. ¤ 512(c)) must be provided to our designated copyright
agent: <o:p></o:p></span></p>

    <p class=NormalWeb1 style='margin:0cm;margin-bottom:.0001pt;text-align:justify'><span
        style='font-size:11.0pt;mso-bidi-font-size:10.0pt;font-family:Arial;mso-bidi-font-family:
Arial'><o:p>&nbsp;</o:p></span></p>

    <p class=NormalWeb1 style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;
margin-left:36.0pt;margin-bottom:.0001pt;text-align:justify;text-indent:-18.0pt;
mso-list:l3 level1 lfo1'><![if !supportLists]><span style='font-size:11.0pt;
mso-bidi-font-size:10.0pt;font-family:Arial;mso-fareast-font-family:Arial;
mso-bidi-font-family:Arial'><span style='mso-list:Ignore'>(a)<span
            style='font:7.0pt "Times New Roman"'>&nbsp; </span></span></span><![endif]><span
        style='font-size:11.0pt;mso-bidi-font-size:10.0pt;font-family:Arial;mso-bidi-font-family:
Arial'>your physical or electronic signature; <o:p></o:p></span></p>

    <p class=NormalWeb1 style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;
margin-left:36.0pt;margin-bottom:.0001pt;text-align:justify'><span
        style='font-size:11.0pt;mso-bidi-font-size:10.0pt;font-family:Arial;mso-bidi-font-family:
Arial'><o:p>&nbsp;</o:p></span></p>

    <p class=NormalWeb1 style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;
margin-left:36.0pt;margin-bottom:.0001pt;text-align:justify;text-indent:-18.0pt;
mso-list:l3 level1 lfo1'><![if !supportLists]><span style='font-size:11.0pt;
mso-bidi-font-size:10.0pt;font-family:Arial;mso-fareast-font-family:Arial;
mso-bidi-font-family:Arial'><span style='mso-list:Ignore'>(b)<span
            style='font:7.0pt "Times New Roman"'>&nbsp; </span></span></span><![endif]><span
        style='font-size:11.0pt;mso-bidi-font-size:10.0pt;font-family:Arial;mso-bidi-font-family:
Arial'>identification of the copyrighted work(s) that you claim to have been
infringed; <o:p></o:p></span></p>

    <p class=NormalWeb1 style='margin:0cm;margin-bottom:.0001pt;text-align:justify'><span
        style='font-size:11.0pt;mso-bidi-font-size:10.0pt;font-family:Arial;mso-bidi-font-family:
Arial'><o:p>&nbsp;</o:p></span></p>

    <p class=NormalWeb1 style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;
margin-left:36.0pt;margin-bottom:.0001pt;text-align:justify;text-indent:-18.0pt;
mso-list:l3 level1 lfo1'><![if !supportLists]><span style='font-size:11.0pt;
mso-bidi-font-size:10.0pt;font-family:Arial;mso-fareast-font-family:Arial;
mso-bidi-font-family:Arial'><span style='mso-list:Ignore'>(c)<span
            style='font:7.0pt "Times New Roman"'>&nbsp; </span></span></span><![endif]><span
        style='font-size:11.0pt;mso-bidi-font-size:10.0pt;font-family:Arial;mso-bidi-font-family:
Arial'>identification of the materials on our services that you claim is
infringing and that you request us to remove; <o:p></o:p></span></p>

    <p class=NormalWeb1 style='margin:0cm;margin-bottom:.0001pt;text-align:justify'><span
        style='font-size:11.0pt;mso-bidi-font-size:10.0pt;font-family:Arial;mso-bidi-font-family:
Arial'><o:p>&nbsp;</o:p></span></p>

    <p class=NormalWeb1 style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;
margin-left:36.0pt;margin-bottom:.0001pt;text-align:justify;text-indent:-18.0pt;
mso-list:l3 level1 lfo1'><![if !supportLists]><span style='font-size:11.0pt;
mso-bidi-font-size:10.0pt;font-family:Arial;mso-fareast-font-family:Arial;
mso-bidi-font-family:Arial'><span style='mso-list:Ignore'>(d)<span
            style='font:7.0pt "Times New Roman"'>&nbsp; </span></span></span><![endif]><span
        style='font-size:11.0pt;mso-bidi-font-size:10.0pt;font-family:Arial;mso-bidi-font-family:
Arial'>sufficient information to permit us to locate such material;<o:p></o:p></span></p>

    <p class=NormalWeb1 style='margin:0cm;margin-bottom:.0001pt;text-align:justify'><span
        style='font-size:11.0pt;mso-bidi-font-size:10.0pt;font-family:Arial;mso-bidi-font-family:
Arial'><span style="mso-spacerun:yes">&nbsp;</span><o:p></o:p></span></p>

    <p class=NormalWeb1 style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;
margin-left:36.0pt;margin-bottom:.0001pt;text-align:justify;text-indent:-18.0pt;
mso-list:l3 level1 lfo1'><![if !supportLists]><span style='font-size:11.0pt;
mso-bidi-font-size:10.0pt;font-family:Arial;mso-fareast-font-family:Arial;
mso-bidi-font-family:Arial'><span style='mso-list:Ignore'>(e)<span
            style='font:7.0pt "Times New Roman"'>&nbsp; </span></span></span><![endif]><span
        style='font-size:11.0pt;mso-bidi-font-size:10.0pt;font-family:Arial;mso-bidi-font-family:
Arial'>your address, telephone number, and email address; <o:p></o:p></span></p>

    <p class=NormalWeb1 style='margin:0cm;margin-bottom:.0001pt;text-align:justify'><span
        style='font-size:11.0pt;mso-bidi-font-size:10.0pt;font-family:Arial;mso-bidi-font-family:
Arial'><o:p>&nbsp;</o:p></span></p>

    <p class=NormalWeb1 style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;
margin-left:36.0pt;margin-bottom:.0001pt;text-align:justify;text-indent:-18.0pt;
mso-list:l3 level1 lfo1'><![if !supportLists]><span style='font-size:11.0pt;
mso-bidi-font-size:10.0pt;font-family:Arial;mso-fareast-font-family:Arial;
mso-bidi-font-family:Arial'><span style='mso-list:Ignore'>(f)<span
            style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp; </span></span></span><![endif]><span
        style='font-size:11.0pt;mso-bidi-font-size:10.0pt;font-family:Arial;mso-bidi-font-family:
Arial'>a statement that you have a good faith belief that use of the objectionable
materials are not authorized by the copyright owner, its agent, or under the
law; and <o:p></o:p></span></p>

    <p class=NormalWeb1 style='margin:0cm;margin-bottom:.0001pt;text-align:justify'><span
        style='font-size:11.0pt;mso-bidi-font-size:10.0pt;font-family:Arial;mso-bidi-font-family:
Arial'><o:p>&nbsp;</o:p></span></p>

    <p class=NormalWeb1 style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;
margin-left:36.0pt;margin-bottom:.0001pt;text-align:justify;text-indent:-18.0pt;
mso-list:l3 level1 lfo1'><![if !supportLists]><span style='font-size:11.0pt;
mso-bidi-font-size:10.0pt;font-family:Arial;mso-fareast-font-family:Arial;
mso-bidi-font-family:Arial'><span style='mso-list:Ignore'>(g)<span
            style='font:7.0pt "Times New Roman"'>&nbsp; </span></span></span><![endif]><span
        style='font-size:11.0pt;mso-bidi-font-size:10.0pt;font-family:Arial;mso-bidi-font-family:
Arial'>a statement that the information in the notification is accurate, and
under penalty of perjury, that you are either the owner of the copyright that
has allegedly been infringed or that you are authorized to act on behalf of the
copyright owner. <o:p></o:p></span></p>

    <p class=NormalWeb1 style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;
margin-left:36.0pt;margin-bottom:.0001pt;text-align:justify'><span
        style='font-size:11.0pt;mso-bidi-font-size:10.0pt;font-family:Arial;mso-bidi-font-family:
Arial'><o:p>&nbsp;</o:p></span></p>

    <p class=NormalWeb1 style='margin:0cm;margin-bottom:.0001pt;text-align:justify'><span
        style='font-size:11.0pt;mso-bidi-font-size:10.0pt;font-family:Arial;mso-bidi-font-family:
Arial'>Please note that, pursuant to 17 U.S.C. ¤ 512(f), any misrepresentation
of material fact (falsities) in a written notification automatically subjects
the complaining party to liability for any damages, costs and attorneyÕs fees
incurred by us in connection with the written notification and allegation of
copyright infringement.<o:p></o:p></span></p>

    <p class=NormalWeb1 style='margin:0cm;margin-bottom:.0001pt;text-align:justify'><span
        style='font-size:11.0pt;mso-bidi-font-size:10.0pt;font-family:Arial;mso-bidi-font-family:
Arial'>Our designated copyright agent can be contacted via</span><span
        style='font-size:11.0pt;mso-bidi-font-size:10.0pt;font-family:Arial;mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'> &shy;&shy;<u>campuslessons.com</u> at <u><span
            style="mso-spacerun:yes">&nbsp;&nbsp;</span><span class=GramE>support@campuslessons.com
<span style='text-decoration:none;text-underline:none'>.</span></span></u></span><span
        style='font-size:11.0pt;mso-bidi-font-size:10.0pt;font-family:Arial;mso-bidi-font-family:
Arial'><o:p></o:p></span></p>

    <p class=NormalWeb1 style='margin:0cm;margin-bottom:.0001pt;text-align:justify'><span
        style='font-size:11.0pt;mso-bidi-font-size:10.0pt;font-family:Arial;mso-bidi-font-family:
Arial'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial'>TRADEMARK<o:p></o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial;color:black;
mso-themecolor:text1;'>In addition to <u>Activethree, Trademark</u>,
graphics, logos, page headers, button icons, scripts, and service names
included in or made available through any </span><span style='font-family:Arial;
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>Activethree, LLC<span
          style=''> Service are trademarks or trade dress of </span>Activethree,
LLC<span style=''> in the U.S. and other countries. </span>Activethree,
LLCÕs<span style=''> trademarks and trade dress may not be used
in connection with any product or service that is not </span>Activethree<span
          class=GramE>,Inc<span style=''>Õs</span></span><span
          style=''>, in any manner that is likely to cause confusion
among customers, or in any manner that disparages or discredits </span>Activethree,Inc<span
          style=''>. All other trademarks not owned by </span>Activethree,
LLC<span style=''> that appear in any </span>Activethree, LLC<span
          style=''> Service are the property of their respective owners,
who may or may not be affiliated with, connected to, or sponsored by </span>Activethree,
LLC<span style=''>.</span><b style='mso-bidi-font-weight:normal'><o:p></o:p></strong></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial'>YOUR INTERACTION WITH OTHERS<o:p></o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><strong><span style='font-family:Arial;mso-bidi-font-family:Arial;
;font-weight:normal;mso-bidi-font-weight:bold'><o:p>&nbsp;</o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial;color:black;
mso-themecolor:text1'>Activethree, LLC <strong><span style='font-family:Arial;
;font-weight:normal;mso-bidi-font-weight:bold'>MAKES NO
REPRESENTATIONS OR WARRANTIES AS TO THE CONDUCT OF MEMBERS OR THEIR
PROFESSIONAL CAPABILITIES WITH ANY CURRENT OR FUTURE MEMBERS. <span
              class=GramE>YOU ARE SOLELY RESPONSIBLE FOR YOUR INTERACTIONS WITH OTHER MEMBERS
ON <span style='mso-bidi-font-weight:normal'>campuslessons.com</span>.</span> <o:p></o:p></span></strong></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><strong><span style='font-family:Arial;mso-bidi-font-family:Arial;
;font-weight:normal;mso-bidi-font-weight:bold'><o:p>&nbsp;</o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><strong><span style='font-family:Arial;mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1;;font-weight:normal;
mso-bidi-font-weight:bold'>To the maximum extent permitted by applicable law,
in no event shall </span></strong><span style='font-family:Arial;mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'>Activethree, LLC<strong><span
            style='font-family:Arial;;font-weight:normal;mso-bidi-font-weight:
bold'> be liable, directly or indirectly, for any losses or damages whatsoever,
whether direct, indirect, general, special, compensatory, consequential, and/or
incidental, arising out of or relating to the conduct of you or anyone else in
connection with the use of </span></strong>campuslessons.com<strong><span
            style='font-family:Arial;;font-weight:normal;mso-bidi-font-weight:
bold'> or </span></strong>Activethree, LLC<strong><span style='font-family:
Arial;;font-weight:normal;mso-bidi-font-weight:bold'> Services
including, without limitation, death, bodily injury, emotional distress, and/or
any other damages resulting from communications or meetings with other Members
or persons you meet through the Service. This includes any claims, losses, or
damages arising from the conduct of users who have registered under false
pretenses or who attempt to defraud or harm you. <o:p></o:p></span></strong></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><strong><span style='font-family:Arial;mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1;;font-weight:normal;
mso-bidi-font-weight:bold'><o:p>&nbsp;</o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial;color:black;
mso-themecolor:text1;'>You agree to take all necessary
precautions when interacting with other Members, specifically if you decide to
communicate off [</span><span style='font-family:Arial;mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'>campuslessons.com<span
          style=''>] or meet in person, or if you decide to send money to
another Member. <o:p></o:p></span></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial;'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:Arial;
color:black;'>Posting<o:p></o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-fareast-font-family:"Times New Roman";
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1;'>You
agree not to post on </span><span style='font-family:Arial;mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'>Activethree, LLCÕs</span><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1;'> Services, transmit to
other users, communicate any content, or otherwise engage in any activity on </span><span
        style='font-family:Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:
text1'>campuslessons.com</span><span style='font-family:Arial;mso-fareast-font-family:
"Times New Roman";mso-bidi-font-family:Arial;color:black;mso-themecolor:text1;
'> or through </span><span style='font-family:Arial;mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'>Activethree, LLC</span><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1;'>Õs Services, anything
that:</span><span style='font-family:Arial;mso-fareast-font-family:"Times New Roman";
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'><br>
<span style="mso-spacerun:yes">&nbsp;</span><o:p></o:p></span></p>

    <p class=MsoListParagraphCxSpFirst style='margin-bottom:0cm;margin-bottom:.0001pt;
mso-add-space:auto;text-indent:-18.0pt;line-height:normal;mso-list:l5 level1 lfo3;
'><![if !supportLists]><span style='font-family:Arial;
mso-fareast-font-family:Arial;mso-bidi-font-family:Arial;color:black;
mso-themecolor:text1'><span style='mso-list:Ignore'>(a)<span style='font:7.0pt "Times New Roman"'>&nbsp;
</span></span></span><![endif]><span class=GramE><span style='font-family:Arial;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1'>promotes</span></span><span style='font-family:
Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1'> racism, bigotry, hatred or physical harm of
any kind against any group or individual;<o:p></o:p></span></p>

    <p class=MsoListParagraphCxSpMiddle style='margin-bottom:0cm;margin-bottom:
.0001pt;mso-add-space:auto;line-height:normal;'><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoListParagraphCxSpMiddle style='mso-margin-top-alt:auto;margin-bottom:
12.0pt;mso-add-space:auto;text-indent:-18.0pt;line-height:normal;mso-list:l5 level1 lfo3;
'><![if !supportLists]><span style='font-family:Arial;
mso-fareast-font-family:Arial;mso-bidi-font-family:Arial;color:black;
mso-themecolor:text1'><span style='mso-list:Ignore'>(b)<span style='font:7.0pt "Times New Roman"'>&nbsp;
</span></span></span><![endif]><span class=GramE><span style='font-family:Arial;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1'>is</span></span><span style='font-family:
Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1'> intended to or tends to harass, annoy,
threaten or intimidate any other users of </span><span style='font-family:Arial;
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>campuslessons.com</span><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'> or </span><span style='font-family:
Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>Activethree,
LLC</span><span style='font-family:Arial;mso-fareast-font-family:"Times New Roman";
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'> Services;<o:p></o:p></span></p>

    <p class=MsoListParagraphCxSpMiddle style='mso-margin-top-alt:auto;margin-bottom:
12.0pt;mso-add-space:auto;line-height:normal;'><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoListParagraphCxSpMiddle style='mso-margin-top-alt:auto;margin-bottom:
12.0pt;mso-add-space:auto;text-indent:-18.0pt;line-height:normal;mso-list:l5 level1 lfo3;
'><![if !supportLists]><span style='font-family:Arial;
mso-fareast-font-family:Arial;mso-bidi-font-family:Arial;color:black;
mso-themecolor:text1'><span style='mso-list:Ignore'>(c)<span style='font:7.0pt "Times New Roman"'>&nbsp;
</span></span></span><![endif]><span class=GramE><span style='font-family:Arial;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1'>is</span></span><span style='font-family:
Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1'> defamatory, inaccurate, abusive, obscene,
profane, offensive, sexually oriented, obscene or otherwise objectionable;<o:p></o:p></span></p>

    <p class=MsoListParagraphCxSpMiddle style='mso-margin-top-alt:auto;margin-bottom:
12.0pt;mso-add-space:auto;line-height:normal;'><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoListParagraphCxSpMiddle style='mso-margin-top-alt:auto;margin-bottom:
12.0pt;mso-add-space:auto;text-indent:-18.0pt;line-height:normal;mso-list:l5 level1 lfo3;
'><![if !supportLists]><span style='font-family:Arial;
mso-fareast-font-family:Arial;mso-bidi-font-family:Arial;color:black;
mso-themecolor:text1'><span style='mso-list:Ignore'>(d)<span style='font:7.0pt "Times New Roman"'>&nbsp;
</span></span></span><![endif]><span class=GramE><span style='font-family:Arial;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1'>contains</span></span><span style='font-family:
Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1'> others' copyrighted content (e.g., music,
movies, videos, photographs, images, software, etc.) without obtaining consent
first;<o:p></o:p></span></p>

    <p class=MsoListParagraphCxSpMiddle style='mso-margin-top-alt:auto;margin-bottom:
12.0pt;mso-add-space:auto;line-height:normal;'><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoListParagraphCxSpMiddle style='mso-margin-top-alt:auto;margin-bottom:
12.0pt;mso-add-space:auto;text-indent:-18.0pt;line-height:normal;mso-list:l5 level1 lfo3;
'><![if !supportLists]><span style='font-family:Arial;
mso-fareast-font-family:Arial;mso-bidi-font-family:Arial;color:black;
mso-themecolor:text1'><span style='mso-list:Ignore'>(e)<span style='font:7.0pt "Times New Roman"'>&nbsp;
</span></span></span><![endif]><span class=GramE><span style='font-family:Arial;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1'>contains</span></span><span style='font-family:
Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1'> video, audio photographs, or images of
another person without his or her consent;<o:p></o:p></span></p>

    <p class=MsoListParagraphCxSpMiddle style='mso-margin-top-alt:auto;margin-bottom:
12.0pt;mso-add-space:auto;line-height:normal;'><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoListParagraphCxSpMiddle style='mso-margin-top-alt:auto;margin-bottom:
12.0pt;mso-add-space:auto;text-indent:-18.0pt;line-height:normal;mso-list:l5 level1 lfo3;
'><![if !supportLists]><span style='font-family:Arial;
mso-fareast-font-family:Arial;mso-bidi-font-family:Arial;color:black;
mso-themecolor:text1'><span style='mso-list:Ignore'>(f)<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;
</span></span></span><![endif]><span class=GramE><span style='font-family:Arial;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1'>promotes</span></span><span style='font-family:
Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1'> or enables illegal or unlawful activities,
such as instructions on how to make or buy illegal weapons or drugs, violate
someone's privacy, harm or harass another person, obtain others' identity
information, create or disseminate computer viruses, or circumvent copy-protect
devices;<o:p></o:p></span></p>

    <p class=MsoListParagraphCxSpMiddle style='mso-margin-top-alt:auto;margin-bottom:
12.0pt;mso-add-space:auto;line-height:normal;'><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoListParagraphCxSpMiddle style='mso-margin-top-alt:auto;margin-bottom:
12.0pt;mso-add-space:auto;text-indent:-18.0pt;line-height:normal;mso-list:l5 level1 lfo3;
'><![if !supportLists]><span style='font-family:Arial;
mso-fareast-font-family:Arial;mso-bidi-font-family:Arial;color:black;
mso-themecolor:text1'><span style='mso-list:Ignore'>(g)<span style='font:7.0pt "Times New Roman"'>&nbsp;
</span></span></span><![endif]><span class=GramE><span style='font-family:Arial;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1'>intended</span></span><span style='font-family:
Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1'> to defraud, swindle or deceive other users
of </span><span style='font-family:Arial;mso-bidi-font-family:Arial;color:black;
mso-themecolor:text1'>Activethree, LLC</span><span style='font-family:Arial;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1'> Services;<o:p></o:p></span></p>

    <p class=MsoListParagraphCxSpMiddle style='mso-margin-top-alt:auto;margin-bottom:
12.0pt;mso-add-space:auto;line-height:normal;'><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoListParagraphCxSpMiddle style='mso-margin-top-alt:auto;margin-bottom:
12.0pt;mso-add-space:auto;text-indent:-18.0pt;line-height:normal;mso-list:l5 level1 lfo3;
'><![if !supportLists]><span style='font-family:Arial;
mso-fareast-font-family:Arial;mso-bidi-font-family:Arial;color:black;
mso-themecolor:text1'><span style='mso-list:Ignore'>(h)<span style='font:7.0pt "Times New Roman"'>&nbsp;
</span></span></span><![endif]><span class=GramE><span style='font-family:Arial;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1'>contains</span></span><span style='font-family:
Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1'> viruses, time bombs, <span class=SpellE>trojan</span>
horses, <span class=SpellE>cancelbots</span>, worms or other harmful, or
disruptive codes, components or devices;<o:p></o:p></span></p>

    <p class=MsoListParagraphCxSpMiddle style='mso-margin-top-alt:auto;margin-bottom:
12.0pt;mso-add-space:auto;line-height:normal;'><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoListParagraphCxSpMiddle style='mso-margin-top-alt:auto;margin-bottom:
12.0pt;mso-add-space:auto;text-indent:-18.0pt;line-height:normal;mso-list:l5 level1 lfo3;
'><![if !supportLists]><span style='font-family:Arial;
mso-fareast-font-family:Arial;mso-bidi-font-family:Arial;color:black;
mso-themecolor:text1'><span style='mso-list:Ignore'>(i)<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span class=GramE><span style='font-family:Arial;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1'>promotes</span></span><span style='font-family:
Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1'> or solicits involvement in or support of a
political platform, religion, cult, or sect;<o:p></o:p></span></p>

    <p class=MsoListParagraphCxSpMiddle style='mso-margin-top-alt:auto;margin-bottom:
12.0pt;mso-add-space:auto;line-height:normal;'><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoListParagraphCxSpMiddle style='mso-margin-top-alt:auto;margin-bottom:
12.0pt;mso-add-space:auto;text-indent:-18.0pt;line-height:normal;mso-list:l5 level1 lfo3;
'><![if !supportLists]><span style='font-family:Arial;
mso-fareast-font-family:Arial;mso-bidi-font-family:Arial;color:black;
mso-themecolor:text1'><span style='mso-list:Ignore'>(j)<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span class=GramE><span style='font-family:Arial;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1'>disseminates</span></span><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'> another person's personal information
without his or her permission, or collects or solicits another person's
personal information for commercial or unlawful purposes;<o:p></o:p></span></p>

    <p class=MsoListParagraphCxSpMiddle style='mso-margin-top-alt:auto;margin-bottom:
12.0pt;mso-add-space:auto;line-height:normal;'><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoListParagraphCxSpMiddle style='mso-margin-top-alt:auto;margin-bottom:
12.0pt;mso-add-space:auto;text-indent:-18.0pt;line-height:normal;mso-list:l5 level1 lfo3;
'><![if !supportLists]><span style='font-family:Arial;
mso-fareast-font-family:Arial;mso-bidi-font-family:Arial;color:black;
mso-themecolor:text1'><span style='mso-list:Ignore'>(k)<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;
</span></span></span><![endif]><span class=GramE><span style='font-family:Arial;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1'>is</span></span><span style='font-family:
Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1'> off-topic, meaningless, or otherwise
intended to annoy or interfere with others' enjoyment of </span><span
        style='font-family:Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:
text1'>campuslessons.com</span><span style='font-family:Arial;mso-fareast-font-family:
"Times New Roman";mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>;<o:p></o:p></span></p>

    <p class=MsoListParagraphCxSpMiddle style='mso-margin-top-alt:auto;margin-bottom:
12.0pt;mso-add-space:auto;line-height:normal;'><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoListParagraphCxSpMiddle style='mso-margin-top-alt:auto;margin-bottom:
12.0pt;mso-add-space:auto;text-indent:-18.0pt;line-height:normal;mso-list:l5 level1 lfo3;
'><![if !supportLists]><span style='font-family:Arial;
mso-fareast-font-family:Arial;mso-bidi-font-family:Arial;color:black;
mso-themecolor:text1'><span style='mso-list:Ignore'>(l)<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span class=GramE><span style='font-family:Arial;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1'>impersonates</span></span><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'>, or otherwise misrepresents
affiliation, connection or association with, any person or entity;<o:p></o:p></span></p>

    <p class=MsoListParagraphCxSpMiddle style='mso-margin-top-alt:auto;margin-bottom:
12.0pt;mso-add-space:auto;line-height:normal;'><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoListParagraphCxSpMiddle style='mso-margin-top-alt:auto;margin-bottom:
12.0pt;mso-add-space:auto;text-indent:-18.0pt;line-height:normal;mso-list:l5 level1 lfo3;
'><![if !supportLists]><span style='font-family:Arial;
mso-fareast-font-family:Arial;mso-bidi-font-family:Arial;color:black;
mso-themecolor:text1'><span style='mso-list:Ignore'>(m)<span style='font:7.0pt "Times New Roman"'>
</span></span></span><![endif]><span class=GramE><span style='font-family:Arial;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1'>solicits</span></span><span style='font-family:
Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1'> gambling or engages in any gambling or
similar activity;<o:p></o:p></span></p>

    <p class=MsoListParagraphCxSpMiddle style='mso-margin-top-alt:auto;margin-bottom:
12.0pt;mso-add-space:auto;line-height:normal;'><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoListParagraphCxSpMiddle style='mso-margin-top-alt:auto;margin-bottom:
12.0pt;mso-add-space:auto;text-indent:-18.0pt;line-height:normal;mso-list:l5 level1 lfo3;
'><![if !supportLists]><span style='font-family:Arial;
mso-fareast-font-family:Arial;mso-bidi-font-family:Arial;color:black;
mso-themecolor:text1'><span style='mso-list:Ignore'>(n)<span style='font:7.0pt "Times New Roman"'>&nbsp;
</span></span></span><![endif]><span class=GramE><span style='font-family:Arial;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1'>uses</span></span><span style='font-family:
Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1'> scripts, bots or other automated technology
to access </span><span style='font-family:Arial;mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1'>campuslessons.com</span><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'> or </span><span style='font-family:
Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>Activethree,
LLC</span><span style='font-family:Arial;mso-fareast-font-family:"Times New Roman";
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'> Services;<o:p></o:p></span></p>

    <p class=MsoListParagraphCxSpMiddle style='mso-margin-top-alt:auto;margin-bottom:
12.0pt;mso-add-space:auto;line-height:normal;'><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoListParagraphCxSpMiddle style='mso-margin-top-alt:auto;margin-bottom:
12.0pt;mso-add-space:auto;text-indent:-18.0pt;line-height:normal;mso-list:l5 level1 lfo3;
'><![if !supportLists]><span style='font-family:Arial;
mso-fareast-font-family:Arial;mso-bidi-font-family:Arial;color:black;
mso-themecolor:text1'><span style='mso-list:Ignore'>(o)<span style='font:7.0pt "Times New Roman"'>&nbsp;
</span></span></span><![endif]><span class=GramE><span style='font-family:Arial;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1'>uses</span></span><span style='font-family:
Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1'> the </span><span style='font-family:Arial;
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>campuslessons.com</span><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'> or </span><span style='font-family:
Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>Activethree,
LLC</span><span style='font-family:Arial;mso-fareast-font-family:"Times New Roman";
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'> for chain letter,
junk mail or spam e-mails;<o:p></o:p></span></p>

    <p class=MsoListParagraphCxSpMiddle style='mso-margin-top-alt:auto;margin-bottom:
12.0pt;mso-add-space:auto;line-height:normal;'><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoListParagraphCxSpMiddle style='mso-margin-top-alt:auto;margin-bottom:
12.0pt;mso-add-space:auto;text-indent:-18.0pt;line-height:normal;mso-list:l5 level1 lfo3;
'><![if !supportLists]><span style='font-family:Arial;
mso-fareast-font-family:Arial;mso-bidi-font-family:Arial;color:black;
mso-themecolor:text1'><span style='mso-list:Ignore'>(p)<span style='font:7.0pt "Times New Roman"'>&nbsp;
</span></span></span><![endif]><span class=GramE><span style='font-family:Arial;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1'>collects</span></span><span style='font-family:
Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1'> or solicits personal information about
anyone under 18; or<o:p></o:p></span></p>

    <p class=MsoListParagraphCxSpMiddle style='mso-margin-top-alt:auto;margin-bottom:
12.0pt;mso-add-space:auto;line-height:normal;'><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoListParagraphCxSpLast align=center style='margin-bottom:0cm;
margin-bottom:.0001pt;mso-add-space:auto;text-align:center;text-indent:-18.0pt;
line-height:normal;mso-list:l5 level1 lfo3;'><![if !supportLists]><span
        style='font-family:Arial;mso-fareast-font-family:Arial;mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'><span style='mso-list:Ignore'>(q)<span
            style='font:7.0pt "Times New Roman"'>&nbsp; </span></span></span><![endif]><span
        class=GramE><span style='font-family:Arial;mso-fareast-font-family:"Times New Roman";
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>is</span></span><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'> in any way used for or in connection
with spamming, <span class=SpellE>spimming</span>, phishing, trolling, or
similar activities.<o:p></o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal;'><span style='font-family:Arial;mso-fareast-font-family:
"Times New Roman";mso-bidi-font-family:Arial;color:black'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial'>REVIEWS &amp; COMMENTS<o:p></o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial'>Posting<o:p></o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal;'><span style='font-family:Arial;mso-fareast-font-family:
"Times New Roman";mso-bidi-font-family:Arial'>Members are encouraged to post
reviews, comments, photos, submit suggestions, ideas, comments, questions, or
other information, so long as the content is not illegal, obscene, threatening,
defamatory, invasive of privacy, infringing of intellectual property rights, or
otherwise injurious to third parties or objectionable and does not consist of
or contain software viruses, political campaigning, commercial solicitation,
chain letters, mass mailings, or any form of &quot;spam.&quot; <o:p></o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal;'><span style='font-family:Arial;mso-fareast-font-family:
"Times New Roman";mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal;'><b style='mso-bidi-font-weight:normal'><span
          style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial'>Removal<o:p></o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal;'><span style='font-family:Arial;mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'>Activethree, LLC</span><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'> reserves the right, but not the obligation,
to monitor, remove, or edit the content you submit on </span><span
        style='font-family:Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:
text1'>campuslessons.com</span><span style='font-family:Arial;mso-fareast-font-family:
"Times New Roman";mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>
if </span><span style='font-family:Arial;mso-bidi-font-family:Arial;color:black;
mso-themecolor:text1'>Activethree, LLC</span><span style='font-family:Arial;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1'> finds that such content violates, or may
violate, any law or these Terms of Use. <o:p></o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal;'><span style='font-family:Arial;mso-fareast-font-family:
"Times New Roman";mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal;'><b style='mso-bidi-font-weight:normal'><span
          style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial'>Use <o:p></o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal;'><span style='font-family:Arial;mso-fareast-font-family:
"Times New Roman";mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>If
you post content or submit material, and unless we indicate otherwise, you
grant </span><span style='font-family:Arial;mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1'>Activethree, LLC</span><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'> a nonexclusive, royalty-free,
perpetual, irrevocable, and fully <span class=SpellE>sublicensable</span> right
to use, reproduce, modify, adapt, publish, translate, create derivative works
from, distribute, and display such content throughout the world in any media.
You further grant </span><span style='font-family:Arial;mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'>Activethree, LLC</span><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'> and <span class=SpellE>sublicensees</span>
the right to use the name that you submit in connection with such content, if
they choose. You represent and warrant that you own or otherwise control all of
the rights to the content that you post; that the content is accurate; that use
of the content you supply does not violate this policy and will not cause
injury to any person or entity; and that you will indemnify </span><span
        style='font-family:Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:
text1'>Activethree, LLC</span><span style='font-family:Arial;mso-fareast-font-family:
"Times New Roman";mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>
for all claims resulting from content you supply. </span><span
        style='font-family:Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:
text1'>Activethree, LLC</span><span style='font-family:Arial;mso-fareast-font-family:
"Times New Roman";mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>
has the right but not the obligation to monitor and edit or remove any activity
or content. </span><span style='font-family:Arial;mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1'>Activethree, LLC</span><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'> takes no responsibility and assumes no
liability for any content posted by you or any third party.<o:p></o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial'>CANCELLATION &amp; REFUNDS<o:p></o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial;color:black;
mso-themecolor:text1;'>You may cancel your registration or
subscription as a Member of </span><span style='font-family:Arial;mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'>campuslessons.com<span
          style=''> and for </span>Activethree, LLC<span
          style=''> Services at any time during your term as a Member by
accessing the <u>campuslessons.com/cancel</u>, clicking on <u>campuslessons.com</u>
link, and providing the information requested. As such, your Membership will
deactivate immediately.<o:p></o:p></span></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial;color:black;
'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial;color:black;
'>If you need to cancel a requested service with another Member
for which you already paid for, you must give a </span><span style='font-family:
Arial;mso-bidi-font-family:Arial;'>24 hours-notice <span
          style='color:black'>before the service is to commence. If you fail to notify
the Member </span>within 24 hours<span style='color:black'>, you will not
receive any refund for the paid for service. <o:p></o:p></span></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial;color:black;
'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial;color:black;
'>If the Member providing the requested service for which you
already paid for cancels the requested service, you will be refunded only the
amount you paid for the MemberÕs service.</span><b style='mso-bidi-font-weight:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial'><o:p></o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial'>PRICING<o:p></o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal;'><span style='font-family:Arial;mso-fareast-font-family:
"Times New Roman";mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal;'><b style='mso-bidi-font-weight:normal'><span
          style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'>Member Prices<o:p></o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal;'><span style='font-family:Arial;mso-fareast-font-family:
"Times New Roman";mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>Membership
for </span><span style='font-family:Arial;mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1'>Activethree, LLC</span><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'> Services on </span><span
        style='font-family:Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:
text1'>campuslessons.com</span><span style='font-family:Arial;mso-fareast-font-family:
"Times New Roman";mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>
is free of charge. <o:p></o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal;'><span style='font-family:Arial;mso-fareast-font-family:
"Times New Roman";mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal;'><span style='font-family:Arial;mso-fareast-font-family:
"Times New Roman";mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>Given
the services are offered by Members of </span><span style='font-family:Arial;
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>campuslessons.com</span><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'>, <span class=GramE>prices are provided
by the Member</span>. Except where noted otherwise, the prices for Members
represent the specific services provided as estimated in accordance with
standard industry pricing. The price is negotiated upon the estimation of the
service provider, and not by </span><span style='font-family:Arial;mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'>Activethree, LLC</span><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'>. The pricing will be confirmed at the
time the order for the service is paid for. On completion of the service, the
Member providing the service will receive payment.<o:p></o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal;'><span style='font-family:Arial;mso-fareast-font-family:
"Times New Roman";mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial;color:black;
mso-themecolor:text1;'>Unless noted, fees are in US dollars. To
the extent permitted by law, serviced fees are nonrefundable.</span><b
        style='mso-bidi-font-weight:normal'><span style='font-family:Arial;mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'><o:p></o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'><o:p>&nbsp;</o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>Service Fees<o:p></o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal;'><span style='font-family:Arial;mso-fareast-font-family:
"Times New Roman";mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal;'><span style='font-family:Arial;mso-fareast-font-family:
"Times New Roman";mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>Once
a Member of </span><span style='font-family:Arial;mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1'>campuslessons.com</span><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'>, you will receive two months free of
service fees. During your first two months, you may transact to receive or
provide services without being charged a service fee. Thereafter, you agree
that when you transact with other Members to receive services, you will be
charged a $0.99 service fee. You also agree that when you transact with other
Members to provide services, you will be charged a $0.99 service fee. <o:p></o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'><o:p>&nbsp;</o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>THIRD PARTIES<o:p></o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'><o:p>&nbsp;</o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial;color:black;
mso-themecolor:text1;'>You understand that third parties
provide particular services on this site. For instance, Amazon provides </span><span
        style='font-family:Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:
text1'>Activethree, LLC<span style=''> services by storing your
personal information and <span class=SpellE>Paypal</span> provides transaction
services. As such, we provide links to the sites of affiliated companies and
certain other businesses. </span>Activethree, LLC<span style=''>
is not responsible for examining or evaluating, and we do not warrant the
offerings of, any of these third parties or the content of their websites. </span>Activethree,
LLC</span><span style='font-family:Arial;mso-fareast-font-family:"Times New Roman";
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'> </span><span
        style='font-family:Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:
text1;'>does not assume any responsibility or liability for the
actions, product, and content of all these and any other third parties. You
should carefully review their terms of use and privacy policies.</span><b
        style='mso-bidi-font-weight:normal'><span style='font-family:Arial;mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'><o:p></o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial'>DISCLAIMER OF WARRANTY<o:p></o:p></span></strong></p>

    <p style='margin:0cm;margin-bottom:.0001pt;;vertical-align:
baseline'><span style='font-size:11.0pt;font-family:Arial;mso-bidi-font-family:
Arial'><o:p>&nbsp;</o:p></span></p>

    <p style='margin:0cm;margin-bottom:.0001pt;;vertical-align:
baseline'><b style='mso-bidi-font-weight:normal'><span style='font-size:11.0pt;
font-family:Arial;mso-bidi-font-family:Arial'>No Warranty<o:p></o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal;'><span style='font-family:Arial;mso-fareast-font-family:
"Times New Roman";mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>THE
</span><span style='font-family:Arial;mso-bidi-font-family:Arial;color:black;
mso-themecolor:text1'>Activethree, LLC</span><span style='font-family:Arial;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1'> SERVICES AND ALL INFORMATION, CONTENT,
MATERIALS, AND OTHER SERVICES INCLUDED ON OR OTHERWISE MADE AVAILABLE TO YOU
THROUGH THE </span><span style='font-family:Arial;mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1'>Activethree, LLC</span><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'> SERVICES ARE PROVIDED BY </span><span
        style='font-family:Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:
text1'>Activethree, LLC</span><span style='font-family:Arial;mso-fareast-font-family:
"Times New Roman";mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>
ON AN &quot;AS IS&quot; AND &quot;AS AVAILABLE&quot; BASIS. </span><span
        style='font-family:Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:
text1'>Activethree, LLC</span><span style='font-family:Arial;mso-fareast-font-family:
"Times New Roman";mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>
MAKES UNLESS OTHERWISE SPECIFIED IN WRITING, NO REPRESENTATIONS OR WARRANTIES
OF ANY KIND, EXPRESS OR IMPLIED, AS TO THE OPERATION OF THE </span><span
        style='font-family:Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:
text1'>Activethree, LLC</span><span style='font-family:Arial;mso-fareast-font-family:
"Times New Roman";mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>
SERVICES, OR THE INFORMATION, CONTENT, MATERIALS, OR OTHER SERVICES INCLUDED ON
OR OTHERWISE MADE AVAILABLE TO YOU THROUGH THE </span><span style='font-family:
Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>Activethree,
LLC</span><span style='font-family:Arial;mso-fareast-font-family:"Times New Roman";
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'> SERVICES. YOU
EXPRESSLY AGREE THAT YOUR USE OF THE </span><span style='font-family:Arial;
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>Activethree, LLC</span><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'> SERVICES IS AT YOUR SOLE RISK.<o:p></o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal;'><span style='font-family:Arial;mso-fareast-font-family:
"Times New Roman";mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal;'><span style='font-family:Arial;mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'>Activethree, LLC</span><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'> DOES NOT WARRANT THAT THE </span><span
        style='font-family:Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:
text1'>Activethree, LLC</span><span style='font-family:Arial;mso-fareast-font-family:
"Times New Roman";mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>
SERVICES, INFORMATION, CONTENT, MATERIALS, OR OTHER SERVICES INCLUDED ON OR
OTHERWISE MADE AVAILABLE TO YOU THROUGH THE </span><span style='font-family:
Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>Activethree,
LLC</span><span style='font-family:Arial;mso-fareast-font-family:"Times New Roman";
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'> SERVICES, </span><span
        style='font-family:Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:
text1'>Activethree, LLC</span><span style='font-family:Arial;mso-fareast-font-family:
"Times New Roman";mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>
SERVERS OR ELECTRONIC COMMUNICATIONS SENT FROM </span><span style='font-family:
Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>Activethree,
LLC</span><span style='font-family:Arial;mso-fareast-font-family:"Times New Roman";
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'> ARE FREE OF
VIRUSES OR OTHER HARMFUL COMPONENTS. </span><span style='font-family:Arial;
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>Activethree, LLC</span><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'> WILL NOT BE LIABLE FOR ANY DAMAGES OF
ANY KIND ARISING FROM THE USE OF ANY </span><span style='font-family:Arial;
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>Activethree, LLC</span><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'> SERVICE, OR FROM ANY INFORMATION,
CONTENT, MATERIALS, OR OTHER SERVICES INCLUDED ON OR OTHERWISE MADE AVAILABLE
TO YOU THROUGH ANY </span><span style='font-family:Arial;mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'>Activethree, LLC</span><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'> SERVICE, INCLUDING, BUT NOT LIMITED TO
DIRECT, INDIRECT, INCIDENTAL, PUNITIVE, AND CONSEQUENTIAL DAMAGES.<o:p></o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal;'><span style='font-family:Arial;mso-fareast-font-family:
"Times New Roman";mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal;'><b style='mso-bidi-font-weight:normal'><span
          style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'>Other Laws<o:p></o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal;'><span style='font-family:Arial;mso-fareast-font-family:
"Times New Roman";mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>Certain
state laws do not allow limitations on implied warranties or the exclusion or
limitation of certain damages. If these laws apply to you, some or all of the
above disclaimers, exclusions, or limitations may not apply to you, and you
might have additional rights. <o:p></o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal;'><span style='font-family:Arial;mso-fareast-font-family:
"Times New Roman";mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'><o:p>&nbsp;</o:p></span></p>

    <p style='margin:0cm;margin-bottom:.0001pt;;vertical-align:
baseline'><span style='font-size:11.0pt;font-family:Arial;mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'>Many jurisdictions have laws protecting
consumers and other contract parties, limiting their ability to waive certain
rights and responsibilities. We respect such laws; nothing herein shall waive
rights or responsibilities that cannot be waived. <o:p></o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'><o:p>&nbsp;</o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>INDEMNIFICATION<o:p></o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'><o:p>&nbsp;</o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal;'><span style='font-family:Arial;mso-fareast-font-family:
"Times New Roman";mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>You
agree to indemnify, defend and hold harmless </span><span style='font-family:
Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>Activethree,
LLC</span><span style='font-family:Arial;mso-fareast-font-family:"Times New Roman";
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>, and each of its
members / officers, directors, employees, agents and related third parties, for
any losses, costs, liabilities and expenses (including reasonable attorneysÕ
fees) relating to or arising out of any third party claim that <o:p></o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal;'><span style='font-family:Arial;mso-fareast-font-family:
"Times New Roman";mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoListParagraphCxSpFirst style='margin-bottom:0cm;margin-bottom:.0001pt;
mso-add-space:auto;text-indent:-18.0pt;line-height:normal;mso-list:l1 level1 lfo4;
'><![if !supportLists]><span style='font-family:Arial;
mso-fareast-font-family:Arial;mso-bidi-font-family:Arial;color:black;
mso-themecolor:text1'><span style='mso-list:Ignore'>(a)<span style='font:7.0pt "Times New Roman"'>&nbsp;
</span></span></span><![endif]><span class=GramE><span style='font-family:Arial;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1'>your</span></span><span style='font-family:
Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1'> use of or inability to use the </span><span
        style='font-family:Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:
text1'>campuslessons.com</span><span style='font-family:Arial;mso-fareast-font-family:
"Times New Roman";mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>
or </span><span style='font-family:Arial;mso-bidi-font-family:Arial;color:black;
mso-themecolor:text1'>Activethree, LLC</span><span style='font-family:Arial;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1'> Services,<o:p></o:p></span></p>

    <p class=MsoListParagraphCxSpMiddle style='margin-bottom:0cm;margin-bottom:
.0001pt;mso-add-space:auto;line-height:normal;'><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoListParagraphCxSpLast style='margin-bottom:0cm;margin-bottom:.0001pt;
mso-add-space:auto;text-indent:-18.0pt;line-height:normal;mso-list:l1 level1 lfo4;
'><![if !supportLists]><span style='font-family:Arial;
mso-fareast-font-family:Arial;mso-bidi-font-family:Arial;color:black;
mso-themecolor:text1'><span style='mso-list:Ignore'>(b)<span style='font:7.0pt "Times New Roman"'>&nbsp;
</span></span></span><![endif]><span class=GramE><span style='font-family:Arial;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1'>any</span></span><span style='font-family:
Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1'> user postings made by you, <o:p></o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal;'><span style='font-family:Arial;mso-fareast-font-family:
"Times New Roman";mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoListParagraph style='margin-bottom:0cm;margin-bottom:.0001pt;
mso-add-space:auto;text-indent:-18.0pt;line-height:normal;mso-list:l1 level1 lfo4;
'><![if !supportLists]><span style='font-family:Arial;
mso-fareast-font-family:Arial;mso-bidi-font-family:Arial;color:black;
mso-themecolor:text1'><span style='mso-list:Ignore'>(c)<span style='font:7.0pt "Times New Roman"'>&nbsp;
</span></span></span><![endif]><span class=GramE><span style='font-family:Arial;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1'>your</span></span><span style='font-family:
Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1'> violation of any these Terms of Use or your
violation of any rights of a third party, or <o:p></o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal;'><span style='font-family:Arial;mso-fareast-font-family:
"Times New Roman";mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoListParagraph style='margin-bottom:0cm;margin-bottom:.0001pt;
mso-add-space:auto;text-indent:-18.0pt;line-height:normal;mso-list:l1 level1 lfo4;
'><![if !supportLists]><span style='font-family:Arial;
mso-fareast-font-family:Arial;mso-bidi-font-family:Arial;color:black;
mso-themecolor:text1'><span style='mso-list:Ignore'>(d)<span style='font:7.0pt "Times New Roman"'>&nbsp;
</span></span></span><![endif]><span class=GramE><span style='font-family:Arial;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1'>your</span></span><span style='font-family:
Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1'> violation of any applicable laws, rules or
regulations. <o:p></o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal;'><span style='font-family:Arial;mso-fareast-font-family:
"Times New Roman";mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal;'><span style='font-family:Arial;mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'>Activethree, LLC</span><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'> reserves the right, at its own cost,
to assume the exclusive defense and control of any matter otherwise subject to
indemnification by you, in which event you will fully cooperate with </span><span
        style='font-family:Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:
text1'>Activethree, LLC</span><span style='font-family:Arial;mso-fareast-font-family:
"Times New Roman";mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>
in asserting any available defenses.<o:p></o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial'>LIMITATION OF LIABILITY<o:p></o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal;'><span style='font-family:Arial;mso-fareast-font-family:
"Times New Roman";mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>TO
THE MAXIMUM EXTENT PERMITTED BY APPLICABLE LAW, IN NO EVENT WILL </span><span
        style='font-family:Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:
text1'>Activethree, <span class=GramE>LLC<span style='mso-fareast-font-family:
"Times New Roman"'><span style="mso-spacerun:yes">&nbsp; </span>BE</span></span></span><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'> LIABLE FOR ANY INCIDENTAL, SPECIAL,
CONSEQUENTIAL OR INDIRECT DAMAGES ARISING OUT OF OR RELATING TO THE USE OR
INABILITY TO USE </span><span style='font-family:Arial;mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'>Activethree, LLC</span><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'> SERVICES, INCLUDING, WITHOUT
LIMITATION, DAMAGES FOR LOSS OR CORRUPTION OF DATA OR PROGRAMS, SERVICE
INTERRUPTIONS AND PROCUREMENT OF SUBSTITUTE SERVICES, EVEN IF </span><span
        style='font-family:Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:
text1'>Activethree, LLC</span><span style='font-family:Arial;mso-fareast-font-family:
"Times New Roman";mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'><span
          style="mso-spacerun:yes">&nbsp; </span>KNOWS OR HAS BEEN ADVISED OF THE
POSSIBILITY OF SUCH DAMAGES. TO THE MAXIMUM EXTENT PERMITTED BY APPLICABLE LAW,
UNDER NO CIRCUMSTANCES WILL </span><span style='font-family:Arial;mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'>Activethree, LLCÕs</span><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'> AGGREGATE LIABILITY, IN ANY FORM OF
ACTION WHATSOEVER IN CONNECTION WITH THIS AGREEMENT OR THE USE OF THE SERVICES
OR THE <span class=GramE>SITE,</span> EXCEED THE PRICE PAID BY YOU FOR THE USE
OF ANY SERVICES.<o:p></o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal;'><span style='font-family:Arial;mso-fareast-font-family:
"Times New Roman";mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>CLAIMS <o:p></o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'><o:p>&nbsp;</o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial;color:black;
mso-themecolor:text1;'>You agree to the following: <o:p></o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial;color:black;
mso-themecolor:text1;'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoListParagraphCxSpFirst style='margin-bottom:0cm;margin-bottom:.0001pt;
mso-add-space:auto;text-indent:-18.0pt;line-height:normal;mso-list:l2 level1 lfo2'><![if !supportLists]><span
        style='font-family:Arial;mso-fareast-font-family:Arial;mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'><span style='mso-list:Ignore'>(a)<span
            style='font:7.0pt "Times New Roman"'>&nbsp; </span></span></span><![endif]><span
        class=GramE><span style='font-family:Arial;mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1;'>any</span></span><span
        style='font-family:Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:
text1;'> claim, cause of action or dispute (&quot;Claim&quot;)
arising out of or related to these Terms of Use or your use of </span><span
        style='font-family:Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:
text1'>campuslessons.com<span style=''> is governed by
California (&quot;CA&quot;) law regardless of your location or any conflict or
choice of law principle; <o:p></o:p></span></span></p>

    <p class=MsoListParagraphCxSpMiddle style='margin-bottom:0cm;margin-bottom:
.0001pt;mso-add-space:auto;line-height:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1;'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoListParagraphCxSpMiddle style='margin-bottom:0cm;margin-bottom:
.0001pt;mso-add-space:auto;text-indent:-18.0pt;line-height:normal;mso-list:
l2 level1 lfo2'><![if !supportLists]><span style='font-family:Arial;mso-fareast-font-family:
Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'><span
          style='mso-list:Ignore'>(b)<span style='font:7.0pt "Times New Roman"'>&nbsp; </span></span></span><![endif]><span
        style='font-family:Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:
text1;'>Claims must be resolved exclusively by state or federal
court in San Diego, CA (except we may seek injunctive remedy anywhere); <o:p></o:p></span></p>

    <p class=MsoListParagraphCxSpMiddle><span style='font-family:Arial;mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1;'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoListParagraphCxSpMiddle style='margin-bottom:0cm;margin-bottom:
.0001pt;mso-add-space:auto;text-indent:-18.0pt;line-height:normal;mso-list:
l2 level1 lfo2'><![if !supportLists]><span style='font-family:Arial;mso-fareast-font-family:
Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'><span
          style='mso-list:Ignore'>(c)<span style='font:7.0pt "Times New Roman"'>&nbsp; </span></span></span><![endif]><span
        style='font-family:Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:
text1;'>Regardless of any statute or law to the contrary, and
to the maximum extent permitted by law, any claim must be filed within one (1)
year after the date of the <span class=GramE>incident giving</span> rise to the
claim, or be forever barred.<o:p></o:p></span></p>

    <p class=MsoListParagraphCxSpMiddle style='margin-bottom:0cm;margin-bottom:
.0001pt;mso-add-space:auto;line-height:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1;'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoListParagraphCxSpLast style='margin-bottom:0cm;margin-bottom:.0001pt;
mso-add-space:auto;text-indent:-18.0pt;line-height:normal;mso-list:l2 level1 lfo2'><![if !supportLists]><span
        style='font-family:Arial;mso-fareast-font-family:Arial;mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'><span style='mso-list:Ignore'>(d)<span
            style='font:7.0pt "Times New Roman"'>&nbsp; </span></span></span><![endif]><span
        class=GramE><span style='font-family:Arial;mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1;'>to</span></span><span
        style='font-family:Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:
text1;'> submit to personal jurisdiction of said courts; <o:p></o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial;color:black;
mso-themecolor:text1;'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoListParagraph style='margin-bottom:0cm;margin-bottom:.0001pt;
mso-add-space:auto;text-indent:-18.0pt;line-height:normal;mso-list:l2 level1 lfo2'><![if !supportLists]><span
        style='font-family:Arial;mso-fareast-font-family:Arial;mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'><span style='mso-list:Ignore'>(e)<span
            style='font:7.0pt "Times New Roman"'>&nbsp; </span></span></span><![endif]><span
        class=GramE><span style='font-family:Arial;mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1;'>not</span></span><span
        style='font-family:Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:
text1;'> to bring or take part in a class action against </span><span
        style='font-family:Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:
text1'>campuslessons.com<span style=''> Entities; <o:p></o:p></span></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial;color:black;
mso-themecolor:text1;'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoListParagraphCxSpFirst style='margin-bottom:0cm;margin-bottom:.0001pt;
mso-add-space:auto;text-indent:-18.0pt;line-height:normal;mso-list:l2 level1 lfo2'><![if !supportLists]><span
        style='font-family:Arial;mso-fareast-font-family:Arial;mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'><span style='mso-list:Ignore'>(f)<span
            style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp; </span></span></span><![endif]><span
        style='font-family:Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:
text1;'>(<span class=GramE>except</span> government agencies)
to indemnify </span><span style='font-family:Arial;mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1'>campuslessons.com<span> Entities for any damage, loss, and expense (e.g. legal fees) arising
from claims related to your use of </span>campuslessons.com<span
          style=''>; <o:p></o:p></span></span></p>

    <p class=MsoListParagraphCxSpMiddle style='margin-bottom:0cm;margin-bottom:
.0001pt;mso-add-space:auto;line-height:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1;'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoListParagraphCxSpMiddle style='margin-bottom:0cm;margin-bottom:
.0001pt;mso-add-space:auto;text-indent:-18.0pt;line-height:normal;mso-list:
l2 level1 lfo2'><![if !supportLists]><span style='font-family:Arial;mso-fareast-font-family:
Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'><span
          style='mso-list:Ignore'>(g)<span style='font:7.0pt "Times New Roman"'>&nbsp; </span></span></span><![endif]><span
        class=GramE><span style='font-family:Arial;mso-bidi-font-family:Arial;
color:black;mso-themecolor:text1;'>you</span></span><span
        style='font-family:Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:
text1;'> are liable for terms of use breaches by affiliates
(e.g. marketers) paid by you, directly or indirectly (e.g. through an affiliate
network).<o:p></o:p></span></p>

    <p class=MsoListParagraphCxSpLast style='margin-bottom:0cm;margin-bottom:.0001pt;
mso-add-space:auto;line-height:normal'><b style='mso-bidi-font-weight:normal'><span
          style='font-family:Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:
text1'><o:p>&nbsp;</o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'><o:p>&nbsp;</o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>DISPUTES<o:p></o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'><o:p>&nbsp;</o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal;'><span style='font-family:Arial;mso-fareast-font-family:
"Times New Roman";mso-bidi-font-family:Arial;color:black;mso-themecolor:text1;
mso-bidi-font-weight:bold'>You and </span><span style='font-family:Arial;
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>Activethree, LLC</span><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1;mso-bidi-font-weight:bold'> agree that
any dispute or claim arising from or related to your use of any </span><span
        style='font-family:Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:
text1'>Activethree, LLC</span><span style='font-family:Arial;mso-fareast-font-family:
"Times New Roman";mso-bidi-font-family:Arial;color:black;mso-themecolor:text1;
mso-bidi-font-weight:bold'> Service, or to any services performed by </span><span
        style='font-family:Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:
text1'>Activethree, LLC</span><span style='font-family:Arial;mso-fareast-font-family:
"Times New Roman";mso-bidi-font-family:Arial;color:black;mso-themecolor:text1;
mso-bidi-font-weight:bold'> or through </span><span style='font-family:Arial;
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>campuslessons.com</span><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1;mso-bidi-font-weight:bold'> will be
subject to and resolved by BINDING ARBITRATION, which is governed by the </span><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1'>Federal Arbitration Act and federal
arbitration law.<span style='mso-bidi-font-weight:bold'> </span>You may assert
claims in small claims court if your claims qualify. <o:p></o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal;'><span style='font-family:Arial;mso-fareast-font-family:
"Times New Roman";mso-bidi-font-family:Arial;color:black;mso-themecolor:text1;
mso-bidi-font-weight:bold'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal;'><span style='font-family:Arial;mso-fareast-font-family:
"Times New Roman";mso-bidi-font-family:Arial;color:black;mso-themecolor:text1;
mso-bidi-font-weight:bold'>You and </span><span style='font-family:Arial;
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>Activethree, LLC</span><span
        style='font-family:Arial;mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:
Arial;color:black;mso-themecolor:text1;mso-bidi-font-weight:bold'> agree that
any dispute resolution proceedings will be conducted only on an individual
basis and neither will participate in any class, consolidated or representative
action.</span><span style='font-family:Arial;mso-fareast-font-family:"Times New Roman";
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>&nbsp;If for any
reason a claim proceeds in court rather than in arbitration&nbsp;<span
          style='mso-bidi-font-weight:bold'>we each waive any right to a jury trial</span>.
We also both agree that you or we may bring suit in court to enjoin
infringement or other misuse of intellectual property rights.<o:p></o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal;'><span style='font-family:Arial;mso-fareast-font-family:
"Times New Roman";mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>APPLICABLE LAW<o:p></o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'><o:p>&nbsp;</o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial;color:black;
mso-themecolor:text1;'>You and </span><span style='font-family:
Arial;mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'>Activethree,
LLC<span style=''> agree that the Federal Arbitration Act,
applicable federal law, and the laws of the state of California, without regard
to principles of conflict of laws, will govern these Terms of Use and any
dispute of any sort that might arise between you and </span>Activethree, LLC<span
          style=''>.<o:p></o:p></span></span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial'>SITE POLICIES, MODIFICATION, AND SEVERABILITY<o:p></o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial;'>We reserve the right to make changes to our site, policies, and these
Terms of Use at any time. If any of these terms shall be deemed invalid, void,
or for any reason unenforceable, that condition shall be deemed severable and
shall not affect the validity and enforceability of any remaining terms.</span><b
        style='mso-bidi-font-weight:normal'><span style='font-family:Arial;mso-bidi-font-family:
Arial'><o:p></o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:Arial;
mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></strong></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoNormal><o:p>&nbsp;</o:p></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-family:Arial;mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoNormal><o:p>&nbsp;</o:p></p>

    </div>
  </div>

<?php endwhile; ?>
<?php endif; ?>

<!-- ################### -->

<div id="right-sidebar">
  <!-- page.php -->
  <ul class="xoxo">
    <?php dynamic_sidebar('single-widget-area'); ?>
  </ul>
</div>


<?php

get_footer();

?>
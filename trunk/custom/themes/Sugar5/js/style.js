/*********************************************************************************
 * The contents of this file are subject to the SugarCRM Master Subscription
 * Agreement ("License") which can be viewed at
 * http://www.sugarcrm.com/crm/en/msa/master_subscription_agreement_11_April_2011.pdf
 * By installing or using this file, You have unconditionally agreed to the
 * terms and conditions of the License, and You may not use this file except in
 * compliance with the License.  Under the terms of the license, You shall not,
 * among other things: 1) sublicense, resell, rent, lease, redistribute, assign
 * or otherwise transfer Your rights to the Software, and 2) use the Software
 * for timesharing or service bureau purposes such as hosting the Software for
 * commercial gain and/or for the benefit of a third party.  Use of the Software
 * may be subject to applicable fees and any use of the Software without first
 * paying applicable fees is strictly prohibited.  You do not have the right to
 * remove SugarCRM copyrights from the source code or user interface.
 *
 * All copies of the Covered Code must include on each user interface screen:
 *  (i) the "Powered by SugarCRM" logo and
 *  (ii) the SugarCRM copyright notice
 * in the same form as they appear in the distribution.  See full license for
 * requirements.
 *
 * Your Warranty, Limitations of liability and Indemnity are expressly stated
 * in the License.  Please refer to the License for the specific language
 * governing these rights and limitations under the License.  Portions created
 * by SugarCRM are Copyright (C) 2004-2011 SugarCRM, Inc.; All Rights Reserved.
 ********************************************************************************/
YAHOO.util.Event.onAvailable('sitemapLinkSpan',function()
{document.getElementById('sitemapLinkSpan').onclick=function()
{ajaxStatus.showStatus(SUGAR.language.get('app_strings','LBL_LOADING_PAGE'));var smMarkup='';var callback={success:function(r){ajaxStatus.hideStatus();document.getElementById('sm_holder').innerHTML=r.responseText;with(document.getElementById('sitemap').style){display="block";position="absolute";right=0;top=80;}
document.getElementById('sitemapClose').onclick=function()
{document.getElementById('sitemap').style.display="none";}}}
postData='module=Home&action=sitemap&GetSiteMap=now&sugar_body_only=true';YAHOO.util.Connect.asyncRequest('POST','index.php',callback,postData);}});YAHOO.util.Event.onAvailable('subModuleList',IKEADEBUG);function IKEADEBUG()
{var moduleLinks=document.getElementById('moduleList').getElementsByTagName("a");moduleLinkMouseOver=function()
{var matches=/grouptab_([0-9]+)/i.exec(this.id);var tabNum=matches[1];var moduleGroups=document.getElementById('subModuleList').getElementsByTagName("span");for(var i=0;i<moduleGroups.length;i++){if(i==tabNum){moduleGroups[i].className='selected';}
else{moduleGroups[i].className='';}}
var groupList=document.getElementById('moduleList').getElementsByTagName("li");var currentGroupItem=tabNum;for(var i=0;i<groupList.length;i++){var aElem=groupList[i].getElementsByTagName("a")[0];if(aElem==null){continue;}
var classStarter='notC';if(aElem.id=="grouptab_"+tabNum){classStarter='c';currentGroupItem=i;}
var spanTags=groupList[i].getElementsByTagName("span");for(var ii=0;ii<spanTags.length;ii++){if(spanTags[ii].className==null){continue;}
var oldClass=spanTags[ii].className.match(/urrentTab.*/);spanTags[ii].className=classStarter+oldClass;}}
var menuHandle=moduleGroups[tabNum];var parentMenu=groupList[currentGroupItem];if(menuHandle&&parentMenu){updateSubmenuPosition(menuHandle,parentMenu);}};for(var i=0;i<moduleLinks.length;i++){moduleLinks[i].onmouseover=moduleLinkMouseOver;}};function updateSubmenuPosition(menuHandle,parentMenu){var left='';if(left==""){p=parentMenu;var left=0;while(p&&p.tagName.toUpperCase()!='BODY'){left+=p.offsetLeft;p=p.offsetParent;}}
var bw=checkBrowserWidth();if(!parentMenu){return;}
var groupTabLeft=left+(parentMenu.offsetWidth / 2);var subTabHalfLength=0;var children=menuHandle.getElementsByTagName('li');for(var i=0;i<children.length;i++){if(children[i].className=='subTabMore'||children[i].parentNode.className=='cssmenu'){continue;}
subTabHalfLength+=parseInt(children[i].offsetWidth);}
if(subTabHalfLength!=0){subTabHalfLength=subTabHalfLength / 2;}
var totalLengthInTheory=subTabHalfLength+groupTabLeft;if(subTabHalfLength>0&&groupTabLeft>0){if(subTabHalfLength>=groupTabLeft){left=1;}else{left=groupTabLeft-subTabHalfLength;}}
if(totalLengthInTheory>bw){var differ=totalLengthInTheory-bw;left=groupTabLeft-subTabHalfLength-differ-2;}
if(left>=0){menuHandle.style.marginLeft=left+'px';}}
YAHOO.util.Event.onDOMReady(function()
{if(document.getElementById('subModuleList')){var parentMenu=false;var moduleListDom=document.getElementById('moduleList');if(moduleListDom!=null){var parentTabLis=moduleListDom.getElementsByTagName("li");var tabNum=0;for(var ii=0;ii<parentTabLis.length;ii++){var spans=parentTabLis[ii].getElementsByTagName("span");for(var jj=0;jj<spans.length;jj++){if(spans[jj].className.match(/currentTab.*/)){tabNum=ii;}}}
var parentMenu=parentTabLis[tabNum];}
var moduleGroups=document.getElementById('subModuleList').getElementsByTagName("span");for(var i=0;i<moduleGroups.length;i++){if(moduleGroups[i].className.match(/selected/)){tabNum=i;}}
var menuHandle=moduleGroups[tabNum];if(menuHandle&&parentMenu){updateSubmenuPosition(menuHandle,parentMenu);}}});

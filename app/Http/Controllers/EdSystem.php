<?php

namespace App\Http\Controllers;

use App\Models\Notifications;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EdSystem extends Controller
{
    public function sendActiveSystem($sys_type,Request $request){
        $data['title']=__('System access request')." ".$this->sysName($sys_type);
        $data['user_id']=auth()->user()->id;
        $data['event']='active_'.$sys_type;
        $data['notify_to']=1;
        $data['read_by']=0;
        $data['created_by']=auth()->user()->id;
        $data['created_at']=date("Y-m-d H:i:s");
        $admin_user=User::find(1);
        Notifications::create($data);
        $msg= $data['title']."<br>". '<div class="mx-2">'.__('Sender').' : '.auth()->user()->name.'</div>';
        $msg.= '<div class="mx-2 my-1">'.__('Email').' : '.auth()->user()->email.'</div>';
        $msg.= '<div class="mx-2 my-1">'.__('Created at').' : <bdi>'.date("Y-m-d H:i:s").'</bdi></div>';
        $msg= $this->smiple_message($data['title'],$msg);
        
        send_email($admin_user->email, $msg, $data['title']);
        return returnMsg('success', 'dashboard', __('Request Sended successfully'));

    }
    private function sysName($sys_type){
        if($sys_type=='task'){
            return __('Task Managment');
        }
        elseif($sys_type=='hr'){
            return  __('Smart HR');
        }
        elseif($sys_type=='erp'){
            return  __('Smart ERP');
        }
        elseif($sys_type=='ticket'){
            return  __('Smart Tickets');
        }
    }
    public  function smiple_message($title = '', $content = '', $data = array())
    {
      $html = '<div  style="min-height: 250px;"> <table style="direction:ltr;" width="100%" cellspacing="0" cellpadding="0" border="0">
      <tbody>
        <tr>
          <td  style="font-size:0px;vertical-align: top;background-color: #242b3d;padding-left: 16px;padding-right: 5px;padding-bottom: 10px;" align="center">
  
            <div  style="display: inline-block;vertical-align: top;width: 100%;max-width: 60%;">
              <div style="font-size: 24px; line-height: 24px; height:10px;">&nbsp; </div>
              <div  style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;text-align: left;padding-left: 8px;padding-right: 8px;">
                <p style="margin-top: 0px;margin-bottom: 0px;">
                <a  href="' . url('') . '" style="text-decoration: none;outline: none;color: #ffffff;">
                <img src="' .  asset('img/logo-dash.png') . '" alt="logo" style="max-width: 136px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height:110px;outline: none;text-decoration: none;" width="136" height="36"></a></p>
              </div>
            </div>
          
  
            <div  style="display: inline-block;vertical-align: top;width: 100%;max-width: 40%;">
              <div style="font-size: 24px; line-height: 24px; height: 8px;">&nbsp; </div>
              <div  style="font-size: 18px;padding-left: 8px;padding-right: 8px;">
                <table   style="text-align: center;margin-left: auto;margin-right: 0;" cellspacing="0" cellpadding="0" border="0">
                  <tbody>
                    <tr>
                      <td   style="font-family:Arial, sans-serif;font-weight: bold;margin-top: 10px;margin-bottom: 0px;font-size: 1.3em;line-height: 21px;" align="center">
                        <h3  style="outline:none;color:#ffffff;display:block;padding: 7px 16px;padding-top:30px;line-height: 24px;"> البوابة الموحدة لركن الحوار</h3>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
        
            
          </td>
        </tr>
      </tbody>
    </table><div class="parentOfBg"><table  width="100%" cellspacing="0" cellpadding="0" border="0">
        <tbody>
          <tr>
            <td  align="center" style="background-color: #126de5;padding-left: 24px;padding-right: 24px;padding-top: 64px;padding-bottom: 64px;" >
              <!--[if mso]><table width="584" cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td align="center"><![endif]-->
              <div  style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 19px;line-height: 28px;max-width: 584px;color: #ffffff;text-align: center;">
                <table  cellspacing="0" cellpadding="0" border="0"  style="text-align: center;margin-left: auto;margin-right: auto;">
                  <tbody>
                    <tr>
                      <td align="center" " style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;background-color: #ffffff;color: #424651;border-radius: 96px;padding-left: 16px;padding-right: 16px;padding-top: 16px;padding-bottom: 16px;">
                        <img src="http://www.stampready.net/dashboard/editor/user_uploads/zip_uploads/2018/11/19/FGr4uysEPTw12DdXkW5CHApa/service_upgrade/images/flag-48-primary.png" width="48" height="48" alt="" style="max-width: 48px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;" data-crop="false">
                      </td>
                    </tr>
                    <tr>
                      <td style="font-size: 24px; line-height: 24px; height: 24px;">&nbsp; </td>
                    </tr>
                  </tbody>
                </table>
                <h2  style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 4px;font-size: 30px;line-height: 39px;">' . $title . '</h2>
               ' . $content . '
              </div>
              <!--[if mso]></td></tr></table><![endif]-->
            </td>
          </tr>
        </tbody>
      </table></div><table  width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" class="">
        <tbody>
          <tr>
            <td  style="font-size: 24px;line-height: 24px;height: 24px;background-color: #ffffff;" data-bgcolor="Bg White">&nbsp; </td>
          </tr>
        </tbody>
      </table></div>';
      $html .= ' 
      <table align="center" cellspacing="0" cellpadding="0" border="0" role="presentation">
      <tbody>
        <tr>
          <td width="300"  align="center"  style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;mso-padding-alt: 12px 24px;background-color: #242b3d;border-radius: 4px;">
            <a  href="' . url('') . '" style="text-decoration: none;outline: none;color: #ffffff;display: block;padding: 12px 24px;mso-text-raise: 3px;"> ' . __('Log in') . '</a>
          </td>
        </tr>
      </tbody>
    </table>
    <br>
      <table align="center" style="direction:ltr;" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" >
      <tbody>
        <tr>
          <td  align="center"  style="background-color: #dbe5ea;padding-left: 16px;padding-right: 16px;padding-bottom: 32px;" contenteditable="false">
  
  
            <div style="display: inline-block;vertical-align: top;width: 100%;max-width: 400px;">
              <div style="font-size: 32px; line-height: 32px; height: 32px;">&nbsp; </div>
              <div   style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;color: #82899a;text-align: left;padding-left: 8px;padding-right: 8px;">
                <p style="margin-top: 0px;margin-bottom: 8px;">©2020 smart life Inc. All rights reserved.</p>
                <p  style="margin-top: 0px;margin-bottom: 8px;"> KSA</p>
                <p style="margin-top: 0px;margin-bottom: 0px;">
                  <a  href="#"  style="text-decoration: underline;outline: none;color: #82899a;">Help Center</a> <span class="o_hide-xs">&nbsp; • &nbsp;</span><br class="o_hide-lg" style="display: none;font-size: 0;max-height: 0;width: 0;line-height: 0;overflow: hidden;mso-hide: all;visibility: hidden;">
                  <a  href="' . url('') . '"  style="text-decoration: underline;outline: none;color: #82899a;">login</a> <span class="o_hide-xs">&nbsp; • &nbsp;</span><br class="o_hide-lg" style="display: none;font-size: 0;max-height: 0;width: 0;line-height: 0;overflow: hidden;mso-hide: all;visibility: hidden;">
   
                </p>
              </div>
            </div>
  
  
           
            <div  style="font-size: 64px; line-height: 64px; height: 64px;">&nbsp; </div>
          </td>
        </tr>
      </tbody>
    </table>';
      return $html;
    }
}
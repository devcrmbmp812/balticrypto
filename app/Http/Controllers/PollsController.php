<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poll;
use App\User;
use Sentinel;
use Session;

class PollsController extends Controller
{
    //*************************************** Admin panel function ****************************************//
    public function index(){
      $polls=Poll::where('is_deleted',0)->get();
      return view('admin.polls.index',compact('polls'));
    }

    public function create(){
    return view('admin.polls.create');
    }

    public function store(Request $request){
      $this->validate($request,[
          'question' =>'required',
          'answer' =>'required',
          'options' =>'required',
          ]);

      $poll= new Poll;
      $poll->question=$request->question;
      $poll->answer=$request->answer;
    $options = ""; 
      $option = $request->options;
        foreach ($option as $key => $value) {
          $options.= $value['type']."|";
        }
        $poll->options=$options;
        $poll->save();
        return redirect()->back()->with('success','Polls added successfully.');
    }
    public function edit($id){
      $poll = Poll::where('id',$id)->first();
      return view('admin.polls.edit',compact('poll'));
    }

    public function update(Request $request , $id){

        //return $request->all();
        $this->validate($request,[
          'question' =>'required',
          'answer' =>'required',
          'options' =>'required',
          ]);

        $poll= Poll::find($id);
        $poll->question=$request->question;
        $poll->answer=$request->answer;
        $options = "";
        $option = $request->options;
        foreach ($option as $key => $value) {
          $options.= $value['type']."|";
        }
        $poll->options=$options;
        $poll->save();
        return redirect()->back()->with('success','Polls updated successfully.');
    }

    public function show($id) ///destroy poll from here
    {
        Poll::where('id',$id)->update(['is_deleted'=>1]);
         return redirect()->back()->with('success','Polls deleted successfully');
    }

//*************************************** frontend function ****************************************//
   public function showPolls(){
   // $polls=Poll::orderByRaw("RAND()")->limit(4)->get();

    $polls=Poll::orderByRaw("RAND()")->where('is_deleted',0)->first();
    $session_key = "polls_key_".Sentinel::getUser()->id;
    Session::put($session_key,$polls->id);
    return view('user.polls',compact('polls'));
   }

   public function pollStep1(Request $request)
   {
       $this->validate($request,[
          'answer' =>'required',
          ]);
       $poll=Poll::where('id',$request->id)->first();
       if($poll)
       {
          if($poll->answer == $request->answer )
          {
              $poll_updt=Poll::find($request->id);
              $poll_updt->r_count=$poll->r_count+1;
              $poll_updt->total_count=$poll->total_count+1;
              $poll_updt->save();

              $i=0;
              $options=trim($poll->options,"|");
              $options=explode("|",$options);  
              $correct_answer = "";
              foreach($options as $option){
                if($poll->answer == $i+1) { $correct_answer = $option; }
                $i++;
              }

              return '<div class="row"> 
                        <div class="col-sm-12">
                          <h4>'.$poll->question.'</h4>
                          <h4> That is correct!</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h4>Your answer: <strong>'.$correct_answer.'</strong> </h4>
                        </div>
                      </div>
              <div class="row mt-5"> <div class="col-sm-12"> <a class="btn default-btn text-white"  onclick="setSecondPoll()">Next</a></div></div>';
          } 
          else
          {
            //update polls count
            $poll_updt=Poll::find($request->id);
            $poll_updt->w_count=$poll->w_count+1;
            $poll_updt->total_count=$poll->total_count+1;
            $poll_updt->save();


            $user_id= Sentinel::getUser()->id;
            $user=User::find($user_id);
            $user->show_polls=0;
            $user->save();
            return 0;
          }           
       }
   }

   public function showSecondPolls()
   {
      $session_key = "polls_key_".Sentinel::getUser()->id; 
      $used_poll=Session::get($session_key);
      $used_poll_arr=explode(",", $used_poll);
     // print_r($used_poll_arr);
      $poll2=Poll::whereNotIn('id', $used_poll_arr)->where('is_deleted',0)->orderByRaw("RAND()")->first();
      $new_polls_id=$used_poll.",".$poll2->id;
      Session::put($session_key,$new_polls_id);

            $i=1;
            $options=trim($poll2->options,"|");
            $options=explode("|",$options);  
          $option_html='';
          foreach($options as $option){
            $answer=$i;

         $option_html.= '
         <div class="form-group">
                  <div  class="row">
                    <div class="col-sm-12">
                      <fieldset class="form-group row">
                    <div class="col-sm-12">
                          <div class="form-check">
                              <input type="radio" class="form-check-input" name="answer"  id="'.$answer.'" value="'.$answer.'"/>
                            <label class="form-check-label" for="'.$answer.'">  '.$option.'
                          </label>
                        </div>
                      </div>
                  </fieldset>
                </div>
                  </div>
              </div>';
            $i++; 
          }
          $TOKEN= csrf_token();
      $html='
      <form id="poll-step2-form" method="post" action="">
        <input type="hidden" name="id" value="'.$poll2->id.'"> 
        <input type="hidden" name="_token" value="'.$TOKEN.'">
        <h3>'.$poll2->question.'</h3> 
       '.$option_html.'
        <div class="form-group">
          <input type="button" id="poll-step2" onclick="checkPollStep2()" value="Submit" class="form-control">
        </div>
      </form>';
      return $html;
   }
    public function pollStep2(Request $request)
    {
        $this->validate($request,[
          'answer' =>'required',
          ]);
         $session_key = "polls_key_".Sentinel::getUser()->id; 
      $used_poll=Session::get($session_key);
      $polls_array=explode(",", $used_poll);
      $total_polls=count($polls_array);
       $poll=Poll::where('id',$request->id)->first();
       if($poll)
       {
        if($total_polls>=10)
            {
              $user_id= Sentinel::getUser()->id;
              $user=User::find($user_id);
              $user->show_polls=0;
              $user->polls_success=1;
              $user->total_wdc_bal = Sentinel::getUser()->total_wdc_bal + 1 ;
              $user->save();
               return '<div class="row">
                      <div class="col-sm-12">
                        <h2>Congratulation!</h2>
                      </div>
                      <div class="col-sm-12">
                        <h4>Your all answer is correct!</h4>
                      </div>
                      <div class="col-sm-12">
                        <h4><strong>You got 1 BCT token.</streong></h4>
                      </div>
                      </div>';
            }
            else
            {
               if($poll->answer == $request->answer )
                {
                  $poll_updt=Poll::find($request->id);
                  $poll_updt->r_count=$poll->r_count+1;
                  $poll_updt->total_count=$poll->total_count+1;
                  $poll_updt->save();
                  
                  $i=0;
                  $options=trim($poll->options,"|");
                  $options=explode("|",$options);  
                  $correct_answer = "";
                  foreach($options as $option){
                    if($poll->answer == $i+1) { $correct_answer=  $option; }
                    $i++;
                  }
                  return '<div class="row"> 
                        <div class="col-sm-12">
                          <h4>'.$poll->question.'</h4>
                          <h4> That is correct!</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h4>Your answer: <strong>'.$correct_answer.'</strong> </h4>
                        </div>
                      </div>
              <div class="row mt-5"> <div class="col-sm-12"> <a class="btn default-btn text-white"  onclick="setSecondPoll()">Next</a></div></div>';

                } 
                else
                {
                  //update polls count
                  $poll_updt=Poll::find($request->id);
                  $poll_updt->w_count=$poll->w_count+1;
                  $poll_updt->total_count=$poll->total_count+1;
                  $poll_updt->save();

                  $user_id= Sentinel::getUser()->id;
                  $user=User::find($user_id);
                  $user->show_polls=0;
                  $user->save();
                  return 0;
                }   
            }
       }
    }
}

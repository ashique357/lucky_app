<div id="DeleteModal" class="modal fade text-primary" role="dialog">
   <div class="modal-dialog ">
     <!-- Modal content-->
     <form action="" id="deleteForm" method="get">
         <div class="modal-content">
             <div class="modal-header bg-primary">
                 <button type="button" class="close" data-dismiss="modal"></button>
                 <h4 class="modal-title text-left">Publish Confirmation</h4>
             </div>
             <div class="modal-body">
                 {{ csrf_field() }}
                 {{ method_field('post') }}
                 <p class="text-center">Are You Sure Want To Publish the draw?</p>
                 <p>{{session()->get('result')}}</p>
             </div>
             <div class="modal-footer">
                 <center>
                     <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                     <button type="submit" name="" class="btn btn-primary" data-dismiss="modal" onclick="formSubmit()">Yes, Publish</button>
                 </center>
             </div>
         </div>
     </form>
   </div>
  </div>
   
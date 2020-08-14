<div id="DeleteModal" class="modal fade text-danger" role="dialog">
   <div class="modal-dialog ">
     <!-- Modal content-->
     <form action="" id="deleteForm" method="get">
         <div class="modal-content">
             <div class="modal-header bg-danger">
                 <button type="button" class="close" data-dismiss="modal"></button>
                 <h4 class="modal-title text-left">Reject Confirmation</h4>
             </div>
             <div class="modal-body">
                 {{ csrf_field() }}
                 {{ method_field('delete') }}
                 <p class="text-center">Are You Sure Want To Reject ?</p>
             </div>
             <div class="modal-footer">
                 <center>
                     <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                     <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Yes, Reject</button>
                 </center>
             </div>
         </div>
     </form>
   </div>
  </div>
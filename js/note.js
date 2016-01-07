var app = angular.module('note', []);

app.controller("noteController", function($scope, $http) {
    $scope.notes = [];
    this.editId = -1;
       $http.get("api/notes.php").success(function(response) {
       $scope.notes = response; 
    });
    $scope.addNote = function(n) { 
    if ( n.title != "" && n.content != "") {
       newNote = {"title" : n.title, "content" : n.content}; 
       $http.post("api/notes.php", newNote).success(function(response) {
        newNote['id'] = response.id;
        $scope.notes.push(newNote);
        }); 
      $scope.myNote.title = "";
      $scope.myNote.content = ""; 
    }  
   };
    this.clearNote = function() {
      $scope.myNote.title = "";
      $scope.myNote.content = "";
      this.editId = -1;
    };
    this.editNote = function(key) {
       $scope.myNote.title = this.notes[key].title;
       $scope.myNote.content = this.notes[key].note;
       this.editId = key;
    };
    $scope.deleteNote = function(key, id) {
       $scope.notes.splice(key, 1);
       $http.delete("api/notes.php?key="+id).success(function(response) {
     });
    };
    this.toggle =function() {
     $scope.show = !$scope.show;
    }; 
});
app.directive("panelTemplate", function() {
  return {
    restrict : "E",
    template : '<ol ng-show ="myNote.title.length > 0 || myNote.content.length ? true:false"> <div class="panel panel-warning"><div class="panel-heading"><h3 class="panel-title" ng-bind ="myNote.title" >{{x.title}}</h3></div><div class="panel-body" ng-bind ="myNote.content">{{x.note}} </div></div></ol><ol ng-repeat ="(key, value) in nCtrl.notes" ng-click ="nCtrl.editNote(key)"> <div class="panel panel-success"><div class="panel-heading"><h3 class="panel-title">{{value.title}}<span ng-click ="nCtrl.deleteNote(key)" class = "cross glyphicon glyphicon-remove"> </span></h3></div><div class="panel-body">{{value.note}} </div></div></ol>'
  }
});
app.directive("notePad", function(){
    return {
    restrict : "E",
    template :'<table ng-show ="show"><tr><td colspan = "2"><input class = "form-control" type = "text" placeholder = "Title here..." ng-model = "myNote.title"></td></tr> <tr><td colspan = "2"><textarea class = "form-control" rows = "10" cols ="50" placeholder = "Note here..." ng-model = "myNote.content" > </textarea></td></tr> <tr><td><button class = "btn btn-warning" ng-click = "nCtrl.addNote(myNote)" >Save</button></td><td><button class = "btn btn-success" ng-click = "nCtrl.clearNote()">Clear</button></td></tr></table>'
    }
});
 


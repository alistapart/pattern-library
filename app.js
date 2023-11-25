var fs = require('fs');
var path = require('path')

var express = require('express');

var app = express();

app.use(express.logger());

// you must run grunt first to create the 'dist' directory:
app.use(express.static(__dirname + '/dist'));

// Lookup the patterns:
var walk = function(dir, done) {
  var names = [];
  var patterns = {};
  var patterns_list = []; // this is what we actually want to return

  fs.readdir(dir, function(err, list) {
      var pattern_files = []; // *.html files are pattern source
      var usage_files = []; // *.txt files are usage

      for (var i=0; i < list.length; i++) {
          var name = list[i];
          var ext = path.extname(name);
          if (ext == ".txt") {
              usage_files.push(name);
          } else if (ext == ".html") {
              pattern_files.push(name);
          }
      }

      for (var i=0; i < pattern_files.length; i++) {
          names.push(pattern_files[i]);
          patterns[pattern_files[i]] = {
              name: pattern_files[i],
              code: fs.readFileSync(dir + "/" + pattern_files[i])
          };
      }
      for (var i=0; i < usage_files.length; i++) {
          var name = usage_files[i].split(".")[0];
          patterns[name].usage = fs.readFileSync(dir + "/" + usage_files[i]);
      }

      // convert the object back into a list in the order we found the files:
      for (var i=0; i < list.length; i++) {
          patterns_list.push(patterns[list[i]]);
      }

      done({names: names, patterns: patterns_list});
  });
};


app.get('/', function(req, res){
  walk(__dirname + "/dist/patterns", function(results) {
      console.log("results");
      console.log(results);
      res.render("index.ejs", {patternOptions: results.names, patterns: results.patterns});
  });
});

app.get("/patchwork", function(req, res) {
  walk(__dirname + "/dist/patterns", function(results) {
      console.log("results");
      console.log(results);
      res.render("patchwork.ejs", {patternOptions: results.names, patterns: results.patterns});
  });
});

app.listen(3000);

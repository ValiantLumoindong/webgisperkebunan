(function() {
  var __bind = function(fn, me){ return function(){ return fn.apply(me, arguments); }; },
    __hasProp = {}.hasOwnProperty,
    __extends = function(child, parent) { for (var key in parent) { if (__hasProp.call(parent, key)) child[key] = parent[key]; } function ctor() { this.constructor = child; } ctor.prototype = parent.prototype; child.prototype = new ctor(); child.__super__ = parent.prototype; return child; };

  Morris.Grid = (function(_super) {
    __extends(Grid, _super);

    function Grid(options) {
      this.hasToShow = __bind(this.hasToShow, this);
      this.resizeHandler = __bind(this.resizeHandler, this);
      if (typeof options.element === 'string') {
        this.el = $(document.getElementById(options.element));
      } else {
        this.el = $(options.element);
      }
      if ((this.el == null) || this.el.length === 0) {
        throw new Error("Graph container element not found");
      }
      if (this.el.css('position') === 'static') {
        this.el.css('position', 'relative');
      }
      this.options = $.extend({}, this.gridDefaults, this.defaults || {}, options);
      if (typeof this.options.units === 'string') {
        this.options.postUnits = options.units;
      }
      this.raphael = new Raphael(this.el[0]);
      this.elementWidth = null;
      this.elementHeight = null;
      this.dirty = false;
      this.selectFrom = null;
      if (this.init) {
        this.init();
      }
      this.setData(this.options.data);
      this.el.bind('mousemove', (function(_this) {
        return function(evt) {
          var left, offset, right, width, x;
          offset = _this.el.offset();
          x = evt.pageX - offset.left;
          if (_this.selectFrom) {
            left = _this.data[_this.hitTest(Math.min(x, _this.selectFrom))]._x;
            right = _this.data[_this.hitTest(Math.max(x, _this.selectFrom))]._x;
            width = right - left;
            return _this.selectionRect.attr({
              x: left,
              width: width
            });
          } else {
            return _this.fire('hovermove', x, evt.pageY - offset.top);
          }
        };
      })(this));
      this.el.bind('mouseleave', (function(_this) {
        return function(evt) {
          if (_this.selectFrom) {
            _this.selectionRect.hide();
            _this.selectFrom = null;
          }
          return _this.fire('hoverout');
        };
      })(this));
      this.el.bind('touchstart touchmove touchend', (function(_this) {
        return function(evt) {
          var offset, touch;
          touch = evt.originalEvent.touches[0] || evt.originalEvent.changedTouches[0];
          offset = _this.el.offset();
          return _this.fire('hovermove', touch.pageX - offset.left, touch.pageY - offset.top);
        };
      })(this));
      this.el.bind('click', (function(_this) {
        return function(evt) {
          var offset;
          offset = _this.el.offset();
          return _this.fire('gridclick', evt.pageX - offset.left, evt.pageY - offset.top);
        };
      })(this));
      if (this.options.rangeSelect) {
        this.selectionRect = this.raphael.rect(0, 0, 0, this.el.innerHeight()).attr({
          fill: this.options.rangeSelectColor,
          stroke: false
        }).toBack().hide();
        this.el.bind('mousedown', (function(_this) {
          return function(evt) {
            var offset;
            offset = _this.el.offset();
            return _this.startRange(evt.pageX - offset.left);
          };
        })(this));
        this.el.bind('mouseup', (function(_this) {
          return function(evt) {
            var offset;
            offset = _this.el.offset();
            _this.endRange(evt.pageX - offset.left);
            return _this.fire('hovermove', evt.pageX - offset.left, evt.pageY - offset.top);
          };
        })(this));
      }
      if (this.options.resize) {
        $(window).bind('resize', (function(_this) {
          return function(evt) {
            if (_this.timeoutId != null) {
              window.clearTimeout(_this.timeoutId);
            }
            return _this.timeoutId = window.setTimeout(_this.resizeHandler, 100);
          };
        })(this));
      }
      this.el.css('-webkit-tap-highlight-color', 'rgba(0,0,0,0)');
      if (this.postInit) {
        this.postInit();
      }
    }

    Grid.prototype.gridDefaults = {
      dateFormat: null,
      axes: true,
      freePosition: false,
      grid: true,
      gridLineColor: '#aaa',
      gridStrokeWidth: 0.5,
      gridTextColor: '#888',
      gridTextSize: 12,
      gridTextFamily: 'sans-serif',
      gridTextWeight: 'normal',
      hideHover: false,
      yLabelFormat: null,
      yLabelAlign: 'right',
      xLabelAngle: 0,
      numLines: 5,
      padding: 25,
      parseTime: true,
      postUnits: '',
      preUnits: '',
      ymax: 'auto',
      ymin: 'auto 0',
      goals: [],
      goalStrokeWidth: 1.0,
      goalLineColors: ['#666633', '#999966', '#cc6666', '#663333'],
      events: [],
      eventStrokeWidth: 1.0,
      eventLineColors: ['#005a04', '#ccffbb', '#3a5f0b', '#005502'],
      rangeSelect: null,
      rangeSelectColor: '#eef',
      resize: false
    };

    Grid.prototype.setData = function(data, redraw) {
      var e, flatEvents, from, idx, index, maxGoal, minGoal, ret, row, step, to, total, y, ykey, ymax, ymin, yval, _i, _len, _ref, _ref1;
      if (redraw == null) {
        redraw = true;
      }
      this.options.data = data;
      if ((data == null) || data.length === 0) {
        this.data = [];
        this.raphael.clear();
        if (this.hover != null) {
          this.hover.hide();
        }
        return;
      }
      ymax = this.cumulative ? 0 : null;
      ymin = this.cumulative ? 0 : null;
      if (this.options.goals.length > 0) {
        minGoal = Math.min.apply(Math, this.options.goals);
        maxGoal = Math.max.apply(Math, this.options.goals);
        ymin = ymin != null ? Math.min(ymin, minGoal) : minGoal;
        ymax = ymax != null ? Math.max(ymax, maxGoal) : maxGoal;
      }
      this.data = (function() {
        var _i, _len, _results;
        _results = [];
        for (index = _i = 0, _len = data.length; _i < _len; index = ++_i) {
          row = data[index];
          ret = {
            src: row
          };
          ret.label = row[this.options.xkey];
          if (this.options.parseTime) {
            ret.x = Morris.parseDate(ret.label);
            if (this.options.dateFormat) {
              ret.label = this.options.dateFormat(ret.x);
            } else if (typeof ret.label === 'number') {
              ret.label = new Date(ret.label).toString();
            }
          } else if (this.options.freePosition) {
            ret.x = parseFloat(row[this.options.xkey]);
            if (this.options.xLabelFormat) {
              ret.label = this.options.xLabelFormat(ret);
            }
          } else {
            ret.x = index;
            if (this.options.xLabelFormat) {
              ret.label = this.options.xLabelFormat(ret);
            }
          }
          total = 0;
          ret.y = (function() {
            var _j, _len1, _ref, _results1;
            _ref = this.options.ykeys;
            _results1 = [];
            for (idx = _j = 0, _len1 = _ref.length; _j < _len1; idx = ++_j) {
              ykey = _ref[idx];
              yval = row[ykey];
              if (typeof yval === 'string') {
                yval = parseFloat(yval);
              }
              if ((yval != null) && typeof yval !== 'number') {
                yval = null;
              }
              if ((yval != null) && this.hasToShow(idx)) {
                if (this.cumulative) {
                  total += yval;
                } else {
                  if (ymax != null) {
                    ymax = Math.max(yval, ymax);
                    ymin = Math.min(yval, ymin);
                  } else {
                    ymax = ymin = yval;
                  }
                }
              }
              if (this.cumulative && (total != null)) {
                ymax = Math.max(total, ymax);
                ymin = Math.min(total, ymin);
              }
              _results1.push(yval);
            }
            return _results1;
          }).call(this);
          _results.push(ret);
        }
        return _results;
      }).call(this);
      if (this.options.parseTime || this.options.freePosition) {
        this.data = this.data.sort(function(a, b) {
          return (a.x > b.x) - (b.x > a.x);
        });
      }
      this.xmin = this.data[0].x;
      this.xmax = this.data[this.data.length - 1].x;
      this.events = [];
      if (this.options.events.length > 0) {
        if (this.options.parseTime) {
          _ref = this.options.events;
          for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            e = _ref[_i];
            if (e instanceof Array) {
              from = e[0], to = e[1];
              this.events.push([Morris.parseDate(from), Morris.parseDate(to)]);
            } else {
              this.events.push(Morris.parseDate(e));
            }
          }
        } else {
          this.events = this.options.events;
        }
        flatEvents = $.map(this.events, function(e) {
          return e;
        });
        this.xmax = Math.max(this.xmax, Math.max.apply(Math, flatEvents));
        this.xmin = Math.min(this.xmin, Math.min.apply(Math, flatEvents));
      }
      if (this.xmin === this.xmax) {
        this.xmin -= 1;
        this.xmax += 1;
      }
      this.ymin = this.yboundary('min', ymin);
      this.ymax = this.yboundary('max', ymax);
      if (this.ymin === this.ymax) {
        if (ymin) {
          this.ymin -= 1;
        }
        this.ymax += 1;
      }
      if (((_ref1 = this.options.axes) === true || _ref1 === 'both' || _ref1 === 'y') || this.options.grid === true) {
        if (this.options.ymax === this.gridDefaults.ymax && this.options.ymin === this.gridDefaults.ymin) {
          this.grid = this.autoGridLines(this.ymin, this.ymax, this.options.numLines);
          this.ymin = Math.min(this.ymin, this.grid[0]);
          this.ymax = Math.max(this.ymax, this.grid[this.grid.length - 1]);
        } else {
          step = (this.ymax - this.ymin) / (this.options.numLines - 1);
          this.grid = (function() {
            var _j, _ref2, _ref3, _results;
            _results = [];
            for (y = _j = _ref2 = this.ymin, _ref3 = this.ymax; step > 0 ? _j <= _ref3 : _j >= _ref3; y = _j += step) {
              _results.push(y);
            }
            return _results;
          }).call(this);
        }
      }
      this.dirty = true;
      if (redraw) {
        return this.redraw();
      }
    };

    Grid.prototype.yboundary = function(boundaryType, currentValue) {
      var boundaryOption, suggestedValue;
      boundaryOption = this.options["y" + boundaryType];
      if (typeof boundaryOption === 'string') {
        if (boundaryOption.slice(0, 4) === 'auto') {
          if (boundaryOption.length > 5) {
            suggestedValue = parseInt(boundaryOption.slice(5), 10);
            if (currentValue == null) {
              return suggestedValue;
            }
            return Math[boundaryType](currentValue, suggestedValue);
          } else {
            if (currentValue != null) {
              return currentValue;
            } else {
              return 0;
            }
          }
        } else {
          return parseInt(boundaryOption, 10);
        }
      } else {
        return boundaryOption;
      }
    };

    Grid.prototype.autoGridLines = function(ymin, ymax, nlines) {
      var gmax, gmin, grid, smag, span, step, unit, y, ymag;
      span = ymax - ymin;
      ymag = Math.floor(Math.log(span) / Math.log(10));
      unit = Math.pow(10, ymag);
      gmin = Math.floor(ymin / unit) * unit;
      gmax = Math.ceil(ymax / unit) * unit;
      step = (gmax - gmin) / (nlines - 1);
      if (unit === 1 && step > 1 && Math.ceil(step) !== step) {
        step = Math.ceil(step);
        gmax = gmin + step * (nlines - 1);
      }
      if (gmin < 0 && gmax > 0) {
        gmin = Math.floor(ymin / step) * step;
        gmax = Math.ceil(ymax / step) * step;
      }
      if (step < 1) {
        smag = Math.floor(Math.log(step) / Math.log(10));
        grid = (function() {
          var _i, _results;
          _results = [];
          for (y = _i = gmin; step > 0 ? _i <= gmax : _i >= gmax; y = _i += step) {
            _results.push(parseFloat(y.toFixed(1 - smag)));
          }
          return _results;
        })();
      } else {
        grid = (function() {
          var _i, _results;
          _results = [];
          for (y = _i = gmin; step > 0 ? _i <= gmax : _i >= gmax; y = _i += step) {
            _results.push(y);
          }
          return _results;
        })();
      }
      return grid;
    };

    Grid.prototype._calc = function() {
      var angle, bottomOffsets, gridLine, h, i, w, yLabelWidths, _ref, _ref1;
      w = this.el.width();
      h = this.el.height();
      if (this.elementWidth !== w || this.elementHeight !== h || this.dirty) {
        this.elementWidth = w;
        this.elementHeight = h;
        this.dirty = false;
        this.left = this.options.padding;
        this.right = this.elementWidth - this.options.padding;
        this.top = this.options.padding;
        this.bottom = this.elementHeight - this.options.padding;
        if ((_ref = this.options.axes) === true || _ref === 'both' || _ref === 'y') {
          yLabelWidths = (function() {
            var _i, _len, _ref1, _results;
            _ref1 = this.grid;
            _results = [];
            for (_i = 0, _len = _ref1.length; _i < _len; _i++) {
              gridLine = _ref1[_i];
              _results.push(this.measureText(this.yAxisFormat(gridLine)).width);
            }
            return _results;
          }).call(this);
          if (!this.options.horizontal) {
            this.left += Math.max.apply(Math, yLabelWidths);
          } else {
            this.bottom -= Math.max.apply(Math, yLabelWidths);
          }
        }
        if ((_ref1 = this.options.axes) === true || _ref1 === 'both' || _ref1 === 'x') {
          if (!this.options.horizontal) {
            angle = -this.options.xLabelAngle;
          } else {
            angle = -90;
          }
          bottomOffsets = (function() {
            var _i, _ref2, _results;
            _results = [];
            for (i = _i = 0, _ref2 = this.data.length; 0 <= _ref2 ? _i < _ref2 : _i > _ref2; i = 0 <= _ref2 ? ++_i : --_i) {
              _results.push(this.measureText(this.data[i].label, angle).height);
            }
            return _results;
          }).call(this);
          if (!this.options.horizontal) {
            this.bottom -= Math.max.apply(Math, bottomOffsets);
          } else {
            this.left += Math.max.apply(Math, bottomOffsets);
          }
        }
        this.width = Math.max(1, this.right - this.left);
        this.height = Math.max(1, this.bottom - this.top);
        if (!this.options.horizontal) {
          this.dx = this.width / (this.xmax - this.xmin);
          this.dy = this.height / (this.ymax - this.ymin);
          this.yStart = this.bottom;
          this.yEnd = this.top;
          this.xStart = this.left;
          this.xEnd = this.right;
          this.xSize = this.width;
          this.ySize = this.height;
        } else {
          this.dx = this.height / (this.xmax - this.xmin);
          this.dy = this.width / (this.ymax - this.ymin);
          this.yStart = this.left;
          this.yEnd = this.right;
          this.xStart = this.top;
          this.xEnd = this.bottom;
          this.xSize = this.height;
          this.ySize = this.width;
        }
        if (this.calc) {
          return this.calc();
        }
      }
    };

    Grid.prototype.transY = function(y) {
      if (!this.options.horizontal) {
        return this.bottom - (y - this.ymin) * this.dy;
      } else {
        return this.left + (y - this.ymin) * this.dy;
      }
    };

    Grid.prototype.transX = function(x) {
      if (this.data.length === 1) {
        return (this.xStart + this.xEnd) / 2;
      } else {
        return this.xStart + (x - this.xmin) * this.dx;
      }
    };

    Grid.prototype.redraw = function() {
      this.raphael.clear();
      this._calc();
      this.drawGrid();
      this.drawGoals();
      this.drawEvents();
      if (this.draw) {
        return this.draw();
      }
    };

    Grid.prototype.measureText = function(text, angle) {
      var ret, tt;
      if (angle == null) {
        angle = 0;
      }
      tt = this.raphael.text(100, 100, text).attr('font-size', this.options.gridTextSize).attr('font-family', this.options.gridTextFamily).attr('font-weight', this.options.gridTextWeight).rotate(angle);
      ret = tt.getBBox();
      tt.remove();
      return ret;
    };

    Grid.prototype.yAxisFormat = function(label) {
      return this.yLabelFormat(label, 0);
    };

    Grid.prototype.yLabelFormat = function(label, i) {
      if (typeof this.options.yLabelFormat === 'function') {
        return this.options.yLabelFormat(label, i);
      } else {
        return "" + this.options.preUnits + (Morris.commas(label)) + this.options.postUnits;
      }
    };

    Grid.prototype.getYAxisLabelX = function() {
      if (this.options.yLabelAlign === 'right') {
        return this.left - this.options.padding / 2;
      } else {
        return this.options.padding / 2;
      }
    };

    Grid.prototype.drawGrid = function() {
      var basePos, lineY, pos, _i, _len, _ref, _ref1, _ref2, _results;
      if (this.options.grid === false && ((_ref = this.options.axes) !== true && _ref !== 'both' && _ref !== 'y')) {
        return;
      }
      if (!this.options.horizontal) {
        basePos = this.getYAxisLabelX();
      } else {
        basePos = this.getXAxisLabelY();
      }
      _ref1 = this.grid;
      _results = [];
      for (_i = 0, _len = _ref1.length; _i < _len; _i++) {
        lineY = _ref1[_i];
        pos = this.transY(lineY);
        if ((_ref2 = this.options.axes) === true || _ref2 === 'both' || _ref2 === 'y') {
          if (!this.options.horizontal) {
            this.drawYAxisLabel(basePos, pos, this.yAxisFormat(lineY));
          } else {
            this.drawXAxisLabel(pos, basePos, this.yAxisFormat(lineY));
          }
        }
        if (this.options.grid) {
          pos = Math.floor(pos) + 0.5;
          if (!this.options.horizontal) {
            _results.push(this.drawGridLine("M" + this.xStart + "," + pos + "H" + this.xEnd));
          } else {
            _results.push(this.drawGridLine("M" + pos + "," + this.xStart + "V" + this.xEnd));
          }
        } else {
          _results.push(void 0);
        }
      }
      return _results;
    };

    Grid.prototype.drawGoals = function() {
      var color, goal, i, _i, _len, _ref, _results;
      _ref = this.options.goals;
      _results = [];
      for (i = _i = 0, _len = _ref.length; _i < _len; i = ++_i) {
        goal = _ref[i];
        color = this.options.goalLineColors[i % this.options.goalLineColors.length];
        _results.push(this.drawGoal(goal, color));
      }
      return _results;
    };

    Grid.prototype.drawEvents = function() {
      var color, event, i, _i, _len, _ref, _results;
      _ref = this.events;
      _results = [];
      for (i = _i = 0, _len = _ref.length; _i < _len; i = ++_i) {
        event = _ref[i];
        color = this.options.eventLineColors[i % this.options.eventLineColors.length];
        _results.push(this.drawEvent(event, color));
      }
      return _results;
    };

    Grid.prototype.drawGoal = function(goal, color) {
      var path, y;
      y = Math.floor(this.transY(goal)) + 0.5;
      if (!this.options.horizontal) {
        path = "M" + this.xStart + "," + y + "H" + this.xEnd;
      } else {
        path = "M" + y + "," + this.xStart + "V" + this.xEnd;
      }
      return this.raphael.path(path).attr('stroke', color).attr('stroke-width', this.options.goalStrokeWidth);
    };

    Grid.prototype.drawEvent = function(event, color) {
      var from, path, to, x;
      if (event instanceof Array) {
        from = event[0], to = event[1];
        from = Math.floor(this.transX(from)) + 0.5;
        to = Math.floor(this.transX(to)) + 0.5;
        if (!this.options.horizontal) {
          return this.raphael.rect(from, this.yEnd, to - from, this.yStart - this.yEnd).attr({
            fill: color,
            stroke: false
          }).toBack();
        } else {
          return this.raphael.rect(this.yStart, from, this.yEnd - this.yStart, to - from).attr({
            fill: color,
            stroke: false
          }).toBack();
        }
      } else {
        x = Math.floor(this.transX(event)) + 0.5;
        if (!this.options.horizontal) {
          path = "M" + x + "," + this.yStart + "V" + this.yEnd;
        } else {
          path = "M" + this.yStart + "," + x + "H" + this.yEnd;
        }
        return this.raphael.path(path).attr('stroke', color).attr('stroke-width', this.options.eventStrokeWidth);
      }
    };

    Grid.prototype.drawYAxisLabel = function(xPos, yPos, text) {
      var label;
      label = this.raphael.text(xPos, yPos, text).attr('font-size', this.options.gridTextSize).attr('font-family', this.options.gridTextFamily).attr('font-weight', this.options.gridTextWeight).attr('fill', this.options.gridTextColor);
      if (this.options.yLabelAlign === 'right') {
        return label.attr('text-anchor', 'end');
      } else {
        return label.attr('text-anchor', 'start');
      }
    };

    Grid.prototype.drawXAxisLabel = function(xPos, yPos, text) {
      return this.raphael.text(xPos, yPos, text).attr('font-size', this.options.gridTextSize).attr('font-family', this.options.gridTextFamily).attr('font-weight', this.options.gridTextWeight).attr('fill', this.options.gridTextColor);
    };

    Grid.prototype.drawGridLine = function(path) {
      return this.raphael.path(path).attr('stroke', this.options.gridLineColor).attr('stroke-width', this.options.gridStrokeWidth);
    };

    Grid.prototype.startRange = function(x) {
      this.hover.hide();
      this.selectFrom = x;
      return this.selectionRect.attr({
        x: x,
        width: 0
      }).show();
    };

    Grid.prototype.endRange = function(x) {
      var end, start;
      if (this.selectFrom) {
        start = Math.min(this.selectFrom, x);
        end = Math.max(this.selectFrom, x);
        this.options.rangeSelect.call(this.el, {
          start: this.data[this.hitTest(start)].x,
          end: this.data[this.hitTest(end)].x
        });
        return this.selectFrom = null;
      }
    };

    Grid.prototype.resizeHandler = function() {
      this.timeoutId = null;
      this.raphael.setSize(this.el.width(), this.el.height());
      return this.redraw();
    };

    Grid.prototype.hasToShow = function(i) {
      return this.options.shown === true || this.options.shown[i] === true;
    };

    return Grid;

  })(Morris.EventEmitter);

  Morris.parseDate = function(date) {
    var isecs, m, msecs, n, o, offsetmins, p, q, r, ret, secs;
    if (typeof date === 'number') {
      return date;
    }
    m = date.match(/^(\d+) Q(\d)$/);
    n = date.match(/^(\d+)-(\d+)$/);
    o = date.match(/^(\d+)-(\d+)-(\d+)$/);
    p = date.match(/^(\d+) W(\d+)$/);
    q = date.match(/^(\d+)-(\d+)-(\d+)[ T](\d+):(\d+)(Z|([+-])(\d\d):?(\d\d))?$/);
    r = date.match(/^(\d+)-(\d+)-(\d+)[ T](\d+):(\d+):(\d+(\.\d+)?)(Z|([+-])(\d\d):?(\d\d))?$/);
    if (m) {
      return new Date(parseInt(m[1], 10), parseInt(m[2], 10) * 3 - 1, 1).getTime();
    } else if (n) {
      return new Date(parseInt(n[1], 10), parseInt(n[2], 10) - 1, 1).getTime();
    } else if (o) {
      return new Date(parseInt(o[1], 10), parseInt(o[2], 10) - 1, parseInt(o[3], 10)).getTime();
    } else if (p) {
      ret = new Date(parseInt(p[1], 10), 0, 1);
      if (ret.getDay() !== 4) {
        ret.setMonth(0, 1 + ((4 - ret.getDay()) + 7) % 7);
      }
      return ret.getTime() + parseInt(p[2], 10) * 604800000;
    } else if (q) {
      if (!q[6]) {
        return new Date(parseInt(q[1], 10), parseInt(q[2], 10) - 1, parseInt(q[3], 10), parseInt(q[4], 10), parseInt(q[5], 10)).getTime();
      } else {
        offsetmins = 0;
        if (q[6] !== 'Z') {
          offsetmins = parseInt(q[8], 10) * 60 + parseInt(q[9], 10);
          if (q[7] === '+') {
            offsetmins = 0 - offsetmins;
          }
        }
        return Date.UTC(parseInt(q[1], 10), parseInt(q[2], 10) - 1, parseInt(q[3], 10), parseInt(q[4], 10), parseInt(q[5], 10) + offsetmins);
      }
    } else if (r) {
      secs = parseFloat(r[6]);
      isecs = Math.floor(secs);
      msecs = Math.round((secs - isecs) * 1000);
      if (!r[8]) {
        return new Date(parseInt(r[1], 10), parseInt(r[2], 10) - 1, parseInt(r[3], 10), parseInt(r[4], 10), parseInt(r[5], 10), isecs, msecs).getTime();
      } else {
        offsetmins = 0;
        if (r[8] !== 'Z') {
          offsetmins = parseInt(r[10], 10) * 60 + parseInt(r[11], 10);
          if (r[9] === '+') {
            offsetmins = 0 - offsetmins;
          }
        }
        return Date.UTC(parseInt(r[1], 10), parseInt(r[2], 10) - 1, parseInt(r[3], 10), parseInt(r[4], 10), parseInt(r[5], 10) + offsetmins, isecs, msecs);
      }
    } else {
      return new Date(parseInt(date, 10), 0, 1).getTime();
    }
  };

}).call(this);

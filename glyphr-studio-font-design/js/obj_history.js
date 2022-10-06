// start of file
/**
	History
	An object that stores a Glyphr Studio Project
	state, to enable undo.  History is saved per 
	page... essentially, each page gets it's own 
	undo queue.
**/


	function History(pn) {
		this.queue = [];
		this.parentname = pn;
		this.currstate = clone(_GP[this.parentname]);
		this.initialstate = clone(_GP[this.parentname]);
		this.initialdate = new Date().getTime();
	}

	History.prototype.put = function(des) {
		// debug('\n History.put - START');

		this.queue.push({
			'name': getSelectedWorkItemName(),
			'description': des,
			'date': new Date().getTime(),
			'state': clone(this.currstate)
		});

		this.currstate = clone(_GP[this.parentname]);

		setProjectAsUnsaved();

		// debug(' History.put - END\n');
	};

	History.prototype.pull = function() {
		// debug('\n History.pull - START');
		// debug('\t queue.length ' + this.queue.length);

		var si = false;
		if(_UI.ss) {
			si = getSelectedWorkItemShapes().indexOf(_UI.ss);
			// debug('\t sel shape number is ' + si);
		}

		var top = this.queue.length? this.queue.pop().state : this.initialstate;
		_GP[this.parentname] = clone(top);
		this.currstate = clone(top);
		
		if (_UI.navhere === 'import svg'){
			update_NavPanels();

		} else if (_UI.navhere === 'components'){
			if(!_GP.components[_UI.selectedcomponent]){
				si = false;
				_UI.selectedcomponent = getFirstID(_GP.components);
			}
		} else if (_UI.navhere === 'ligatures'){
			if(!_GP.ligatures[_UI.selectedligature]){
				si = false;
				_UI.selectedligature = getFirstID(_GP.ligatures);
			}
		}

		if(isval(si)) {
			selectShape(si);
			redraw('history_pull');
		} else {
			_UI.ss = false;
		}

		// debug('\t after redraw');

		var empty = true;
		for(var q in _UI.history){ if(_UI.history.hasOwnProperty(q)){
			if(_UI.history[q].queue.length){
				empty = false;
				break;
			}
		}}
		if(empty) setProjectAsSaved();

		// debug(' History.pull - END\n');
	};

	// Global Accessor Functions
	function history_put(dsc){
		if(onCanvasEditPage()){
			var queue = _UI.navhere === 'import svg'? 'glyph edit' : _UI.navhere;
			_UI.history[queue].put(dsc);
		}
	}

	function history_pull(){
		if(onCanvasEditPage()){
			closeDialog();
			closeNotation();
			_UI.history[_UI.navhere].pull();
		}
	}

	function history_length() {
		if(onCanvasEditPage()){
			return _UI.history[_UI.navhere].queue.length || 0;
		}

		return 0;
	}

// end of file
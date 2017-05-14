Ext.Loader.setPath('myux', '/jrrc_web_php/public/static/myux');
// Ext.require('/jrrc_web_php/public/static/myux/Table');
Ext.onReady(function() {

	// 变更用户角色按键
	var btn_change_ruler = Ext.create('Ext.button.Button', {
				text : '变更角色',
				width : 100,
				renderTo : Ext.getBody(),
				style : "float:right;margin:8px 5px 0 0;background:green",
				listeners : {
					click : {
						fn : function() {
							showTable();
						}
					}
				}
			}

	);

	function showTable() {

		var Companies = Ext.create('Ext.data.Store', {
					fields : ['id', 'name', 'title'],
					autoLoad : true,
					proxy : {
						type : 'ajax',
						url : '/jrrc_web_php/Rule/showRule'

					}
				});
		var table = Ext.create('Ext.grid.Panel', {
					xtype : 'array-grid',
					requires : ['Ext.grid.column.Action'],
					renderTo:Ext.getBody(),
					title : '功能权限',
					width : '98%',
					height : 450,
					scrollable : true,
					store : Companies,
					stateful : true,
					collapsible : false,
					multiSelect : true,
					stateId : 'stateGrid',
					headerBorders : false,

					columns : [{
								text : '编号',
								width : '20%',
								sortable : true,
								editable : true,
								dataIndex : 'id'
							}, {
								text : 'url',
								width : '40%',
								sortable : true,
								dataIndex : 'name'
							}, {
								text : '功能',
								width : '40%',
								sortable : true,
								dataIndex : 'title'
							}]
				});

	};

});

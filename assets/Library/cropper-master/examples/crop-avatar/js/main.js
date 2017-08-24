(function (factory) {
	if (typeof define === 'function' && define.amd) {
		define(['jquery'], factory);
	} else if (typeof exports === 'object') {
		// Node / CommonJS
		factory(require('jquery'));
	} else {
		factory(jQuery);
	}
})(function ($) {

	'use strict';
	
	var console = window.console || { log: function () { } };

	function CropAvatar($element, $element2) {
		this.$container = $element;
		this.$container2 = $element2;

		this.$avatarView = this.$container.find('.avatar-view');
		this.$avatar = this.$avatarView.find('img');
		this.$avatarModal = this.$container2.find('#avatar-modal');
		this.$loading = this.$container2.find('.loading');

		this.$avatarForm = this.$avatarModal.find('.avatar-form');
		this.$avatarUpload = this.$avatarForm.find('.avatar-upload');
		this.$avatarSrc = this.$avatarForm.find('.avatar-src');
		this.$avatarData = this.$avatarForm.find('.avatar-data');
		this.$avatarInput = this.$avatarForm.find('.avatar-input');
		this.$avatarSave = this.$avatarForm.find('.avatar-save');

		this.$avatarWrapper = this.$avatarModal.find('.img-container');
		this.$avatarPreview = this.$avatarModal.find('.img-preview');
		
		this.datX = this.$avatarModal.find('#dataX');
		this.datY = this.$avatarModal.find('#dataY');
		
		this.init();
	}
	
	CropAvatar.prototype = {
		constructor: CropAvatar,

		support: {
			fileList: !!$('<input type="file">').prop('files'),
			blobURLs: !!window.URL && URL.createObjectURL,
			formData: !!window.FormData
		},

		init: function () {
			this.support.datauri = this.support.fileList && this.support.blobURLs;

			if (!this.support.formData) {
				this.initIframe();
			}

			this.initTooltip();
			//this.initModal();
			this.addListener();
		},

		addListener: function () {
			var _this = this;
			
			this.$avatarView.on('click', $.proxy(this.click, this));
			this.$avatarInput.on('change', $.proxy(this.change, this));
			this.$avatarForm.on('submit', $.proxy(this.submit, this));
		},

		initTooltip: function () {
			this.$avatarView.tooltip({
				placement: 'right'
			});
		},

		initModal: function () {
			this.$avatarModal.modal({
				show: true
			});
		},

		initPreview: function () {
			var url = this.$avatar.attr('src');
			this.$avatarPreview.html('<img src="' + url + '">');
			this.$avatarWrapper.html('<img src="' + url + '">');
		},

		initIframe: function () {
			var target = 'upload-iframe-' + (new Date()).getTime(),
				$iframe = $('<iframe>').attr({
					name: target,
					src: ''
				}),
				_this = this;

			// Ready iframe
			$iframe.one('load', function () {
				$iframe.on('load', function () {
					var data;

					try {
						data = $(this).contents().find('body').text();
					} catch (e) {
						console.log(e.message);
					}

					if (data) {
						try {
							data = $.parseJSON(data);
						} catch (e) {
							console.log(e.message);
						}

						_this.submitDone(data);
					} else {
						_this.submitFail('Image upload failed!');
					}

					_this.submitEnd();
				});
			});

			this.$iframe = $iframe;
			this.$avatarForm.attr('target', target).after($iframe.hide());
		},

		click: function () {			if(document.getElementById("giwangan").checked == true || 			   document.getElementById("soekarno").checked == true ||			   document.getElementById("purabaya").checked == true ||			   document.getElementById("tirtonadi").checked == true){								this.$avatarModal.modal('show');				this.initPreview();			}else {				$("#msgsuccess").attr('class', 'alert alert-danger');				$("#msgsuccess").text('Please select bus terminal before upload image.'); //abok			}
		},
		
		change: function () {
			var files,
				file;

			if (this.support.datauri) {
				files = this.$avatarInput.prop('files');
				
				if (files.length > 0) {
					file = files[0];
					
					if (this.isImageFile(file)) {
						if (this.url) {
							URL.revokeObjectURL(this.url); // Revoke the old one
						}

						this.url = URL.createObjectURL(file);
						this.startCropper();
					}
				}
			} else {
				file = this.$avatarInput.val();

				if (this.isImageFile(file)) {
					this.syncUpload();
				}
			}
		},

		submit: function () {
			if (!this.$avatarSrc.val() && !this.$avatarInput.val()) {
				return false;
			}

			if (this.support.formData) {
				this.ajaxUpload();
				return false;
			}
		},

		rotate: function (e) {
			var data;

			if (this.active) {
				data = $(e.target).data();

				if (data.method) {
					this.$img.cropper(data.method, data.option);
				}
			}
		},

		isImageFile: function (file) {
			if (file.type) {
				return /^image\/\w+$/.test(file.type);
			} else {
				return /\.(jpg|jpeg|png|gif)$/.test(file);
			}
		},

		startCropper: function () {
			var _this = this;
			var image;
			
			if (this.active) {
				this.$img.cropper('replace', this.url);
			} else {
				this.$img = $('<img src="' + this.url + '">');
				this.$avatarWrapper.empty().html(this.$img);
				this.$img.on({
					'build.cropper': function (e) {
						console.log(e.type);
					},
					'built.cropper': function (e) {
						console.log(e.type);
					},
					'dragstart.cropper': function (e) {
						console.log(e.type, e.dragType);
					},
					'dragmove.cropper': function (e) {
						console.log(e.type, e.dragType);
					},
					'dragend.cropper': function (e) {
						console.log(e.type, e.dragType);
					},
					'zoomin.cropper': function (e) {
						console.log(e.type);
					},
					'zoomout.cropper': function (e) {
						console.log(e.type);
					},
					'change.cropper': function (e) {
						console.log(e.type);
					}
				}).cropper({
					data: {
						x: 0,
						y: 0,
						width: 800,
						height: 466
					},
					// responsive: false,
					// checkImageOrigin: false

					// modal: false,
					// guides: false,
					// center: false,
					// highlight: false,
					// background: false,

					// autoCrop: false,
					// autoCropArea: 0.5,
					// dragCrop: false,
					// movable: false,
					// rotatable: false,
					// zoomable: false,
					// touchDragZoom: false,
					// mouseWheelZoom: false,
					// cropBoxMovable: false,
					// cropBoxResizable: false,
					// doubleClickToggle: false,

					/*minCanvasWidth: 10,
					minCanvasHeight: 10,
					minCropBoxWidth: 10,
					minCropBoxHeight: 10,
					minContainerWidth: 10,
					minContainerHeight: 10,*/

					// build: null,
					// built: null,
					// dragstart: null,
					// dragmove: null,
					// dragend: null,
					// zoomin: null,
					// zoomout: null,
					strict: true,
					aspectRatio: NaN,
					preview: this.$avatarPreview.selector,
					crop: function (data) {
						var $dataX = $('#dataX'),
							$dataY = $('#dataY'),
							$dataHeight = $('#dataHeight'),
							$dataWidth = $('#dataWidth'),
							$dataRotate = $('#dataRotate');

						$dataX.val(Math.round(data.x));
						$dataY.val(Math.round(data.y));
						$dataHeight.val(Math.round(data.height));
						$dataWidth.val(Math.round(data.width));
						$dataRotate.val(Math.round(data.rotate));
						
						var json = [
							'{"x":' + data.x,
							'"y":' + data.y,
							'"height":' + data.height,
							'"width":' + data.width,
							'"rotate":' + data.rotate + '}'
						].join();
						
						_this.$avatarData.val(json);
					}
				});
				
				// Copy obj image
				image = this.$img;
				
				// Methods
				$(document.body).on('click', '[data-method]', function () {
					var data = $(this).data(),
						$target,
						result;
		
					if (!image.data('cropper')) {
						return;
					}
					
					if (data.method) {
						data = $.extend({}, data); // Clone a new one

						if (typeof data.target !== 'undefined') {
							$target = $(data.target);
							
							if (typeof data.option === 'undefined') {
								try {
									data.option = JSON.parse($target.val());
								} catch (e) {
									console.log(e.message);
								}
							}
						}
						
						result = image.cropper(data.method, data.option);
						
						if ($.isPlainObject(result) && $target) {
							try {
								$target.val(JSON.stringify(result));
							} catch (e) {
								console.log(e.message);
							}
						}
					}
				}).on('keydown', function (e) {
			
					if (!image.data('cropper')) {
						return;
					}
			
					switch (e.which) {
						case 37: //kiri
							e.preventDefault();
							image.cropper('move', -1, 0);
							break;
			
						case 38://atas
							e.preventDefault();
							image.cropper('move', 0, -1);
							break;
			
						case 39://kanan
							e.preventDefault();
							image.cropper('move', 1, 0);
							break;
			
						case 40://bawah
							e.preventDefault();
							image.cropper('move', 0, 1);
							break;
					}
			
				});

				this.active = true;
			}

			this.$avatarModal.one('hidden.bs.modal', function () {
				_this.$avatarPreview.empty();
				_this.stopCropper();
			});
		},

		stopCropper: function () {
			if (this.active) {
				this.$img.cropper('destroy');
				this.$img.remove();
				this.active = false;
			}
		},

		ajaxUpload: function () {
			var url = this.$avatarForm.attr('action'),
				data = new FormData(this.$avatarForm[0]),
				_this = this;

			$.ajax(url, {
				type: 'post',
				data: data,
				dataType: 'json',
				processData: false,
				contentType: false,

				beforeSend: function () {
					_this.submitStart();
				},

				success: function (data) {
					_this.submitDone(data);										$("#msgsuccess").attr('class', 'alert alert-success');					$("#msgsuccess").text('Upload success. This page will be refresh in 5 seconds...'); //abok					setTimeout(function(){					   window.location.reload(1);					}, 3000);
				},

				error: function (XMLHttpRequest, textStatus, errorThrown) {
					_this.submitFail(textStatus || errorThrown);										$("#msgsuccess").attr('class', 'alert alert-danger');					$("#msgsuccess").text('Upload process fails, reload this page, or use a different image.'); //abok
				},

				complete: function () {
					_this.submitEnd();
				}
			});
		},

		syncUpload: function () {
			this.$avatarSave.click();
		},

		submitStart: function () {
			this.$loading.fadeIn();
		},

		submitDone: function (data) {
			console.log(data);

			if ($.isPlainObject(data) && data.state === 200) {
				if (data.result) {
					this.url = data.result;

					if (this.support.datauri || this.uploaded) {
						this.uploaded = false;
						this.cropDone();
					} else {
						this.uploaded = true;
						this.$avatarSrc.val(this.url);

						this.startCropper();
					}

					this.$avatarInput.val('');
				} else if (data.message) {
					this.alert(data.message);
				}
			} else {
				this.alert('Failed to response');
			}
		},

		submitFail: function (msg) {
			this.alert(msg);
		},

		submitEnd: function () {
			this.$loading.fadeOut();
		},

		cropDone: function () {
			this.$avatarForm.get(0).reset();
			this.$avatar.attr('src', this.url);
			this.stopCropper();
			this.$avatarModal.modal('hide');
		},

		alert: function (msg) {/*
			var $alert = [
				  '<div class="alert alert-danger avatar-alert alert-dismissable">',
					'<button type="button" class="close" data-dismiss="alert">&times;</button>',
					msg,
				  '</div>'
			].join('');
			this.$avatarUpload.after($alert);			*/						$('#avatar-modal').modal('toggle'); //abok
		}
	};

	$(function () {
		return new CropAvatar($('#crop-avatar'), $('#avatar-modal-container'));
	});

});
###*
# To change this license header, choose License Headers in Project Properties.
# To change this template file, choose Tools | Templates
# and open the template in the editor.
###

CURRENT_URL = window.location.href.split('?')[0]
$BODY = $('body')
$MENU_TOGGLE = $('#menu_toggle')
$SIDEBAR_MENU = $('#sidebar-menu')
$SIDEBAR_FOOTER = $('.sidebar-footer')
$LEFT_COL = $('.left_col')
$RIGHT_COL = $('.right_col')
$NAV_MENU = $('.nav_menu')
$FOOTER = $('footer')
# Sidebar

countChecked = ->
  if checkState == 'all'
    $('.bulk_action input[name=\'table_records\']').iCheck 'check'
  if checkState == 'none'
    $('.bulk_action input[name=\'table_records\']').iCheck 'uncheck'
  checkCount = $('.bulk_action input[name=\'table_records\']:checked').length
  if checkCount
    $('.column-title').hide()
    $('.bulk-actions').show()
    $('.action-cnt').html checkCount + ' Records Selected'
  else
    $('.column-title').show()
    $('.bulk-actions').hide()
  return

$(document).ready ->
  # TODO: This is some kind of easy fix, maybe we can improve this

  setContentHeight = ->
    # reset height
    $RIGHT_COL.css 'min-height', $(window).height()
    bodyHeight = $BODY.outerHeight()
    footerHeight = if $BODY.hasClass('footer_fixed') then 0 else $FOOTER.height()
    leftColHeight = $LEFT_COL.eq(1).height() + $SIDEBAR_FOOTER.height()
    contentHeight = if bodyHeight < leftColHeight then leftColHeight else bodyHeight
    # normalize content
    contentHeight -= $NAV_MENU.height() + footerHeight
    $RIGHT_COL.css 'min-height', contentHeight
    return

  $SIDEBAR_MENU.find('a').on 'click', (ev) ->
    $li = $(this).parent()
    if $li.is('.active')
      $li.removeClass 'active active-sm'
      $('ul:first', $li).slideUp ->
        setContentHeight()
        return
    else
      # prevent closing menu if we are on child menu
      if !$li.parent().is('.child_menu')
        $SIDEBAR_MENU.find('li').removeClass 'active active-sm'
        $SIDEBAR_MENU.find('li ul').slideUp()
      $li.addClass 'active'
      $('ul:first', $li).slideDown ->
        setContentHeight()
        return
    return
  # toggle small or large menu
  $MENU_TOGGLE.on 'click', ->
    if $BODY.hasClass('nav-md')
      $SIDEBAR_MENU.find('li.active ul').hide()
      $SIDEBAR_MENU.find('li.active').addClass('active-sm').removeClass 'active'
    else
      $SIDEBAR_MENU.find('li.active-sm ul').show()
      $SIDEBAR_MENU.find('li.active-sm').addClass('active').removeClass 'active-sm'
    $BODY.toggleClass 'nav-md nav-sm'
    setContentHeight()
    return
  # check active menu
  $SIDEBAR_MENU.find('a[href="' + CURRENT_URL + '"]').parent('li').addClass 'current-page'
  $SIDEBAR_MENU.find('a').filter(->
    @href == CURRENT_URL
  ).parent('li').addClass('current-page').parents('ul').slideDown(->
    setContentHeight()
    return
  ).parent().addClass 'active'
  # recompute content when resizing
  $(window).smartresize ->
    setContentHeight()
    return
  setContentHeight()
  # fixed sidebar
  if $.fn.mCustomScrollbar
    $('.menu_fixed').mCustomScrollbar
      autoHideScrollbar: true
      theme: 'minimal'
      mouseWheel: preventDefault: true
  return
# /Sidebar
# Panel toolbox
$(document).ready ->
  $('.collapse-link').on 'click', ->
    $BOX_PANEL = $(this).closest('.x_panel')
    $ICON = $(this).find('i')
    $BOX_CONTENT = $BOX_PANEL.find('.x_content')
    # fix for some div with hardcoded fix class
    if $BOX_PANEL.attr('style')
      $BOX_CONTENT.slideToggle 200, ->
        $BOX_PANEL.removeAttr 'style'
        return
    else
      $BOX_CONTENT.slideToggle 200
      $BOX_PANEL.css 'height', 'auto'
    $ICON.toggleClass 'fa-chevron-up fa-chevron-down'
    return
  $('.close-link').click ->
    $BOX_PANEL = $(this).closest('.x_panel')
    $BOX_PANEL.remove()
    return
  return
# /Panel toolbox
# Tooltip
$(document).ready ->
  $('[data-toggle="tooltip"]').tooltip container: 'body'
  return
# /Tooltip
# Progressbar
if $('.progress .progress-bar')[0]
  $('.progress .progress-bar').progressbar()
# /Progressbar
# Switchery
$(document).ready ->
  if $('.js-switch')[0]
    elems = Array::slice.call(document.querySelectorAll('.js-switch'))
    elems.forEach (html) ->
      switchery = new Switchery(html, color: '#26B99A')
      return
  return
# /Switchery
# iCheck
$(document).ready ->
  if $('input.flat')[0]
    $(document).ready ->
      $('input.flat').iCheck
        checkboxClass: 'icheckbox_flat-green'
        radioClass: 'iradio_flat-green'
      return
  return
# /iCheck
# Table
$('table input').on 'ifChecked', ->
  checkState = ''
  $(this).parent().parent().parent().addClass 'selected'
  countChecked()
  return
$('table input').on 'ifUnchecked', ->
  checkState = ''
  $(this).parent().parent().parent().removeClass 'selected'
  countChecked()
  return
checkState = ''
$('.bulk_action input').on 'ifChecked', ->
  checkState = ''
  $(this).parent().parent().parent().addClass 'selected'
  countChecked()
  return
$('.bulk_action input').on 'ifUnchecked', ->
  checkState = ''
  $(this).parent().parent().parent().removeClass 'selected'
  countChecked()
  return
$('.bulk_action input#check-all').on 'ifChecked', ->
  checkState = 'all'
  countChecked()
  return
$('.bulk_action input#check-all').on 'ifUnchecked', ->
  checkState = 'none'
  countChecked()
  return
# Accordion
$(document).ready ->
  $('.expand').on 'click', ->
    $(this).next().slideToggle 200
    $expand = $(this).find('>:first-child')
    if $expand.text() == '+'
      $expand.text '-'
    else
      $expand.text '+'
    return
  return
# NProgress
if typeof NProgress != 'undefined'
  $(document).ready ->
    NProgress.start()
    return
  $(window).load ->
    NProgress.done()
    return

###*
# Resize function without multiple trigger
#
# Usage:
# $(window).smartresize(function(){
#     // code here
# });
###

(($, sr) ->
  # debouncing function from John Hann
  # http://unscriptable.com/index.php/2009/03/20/debouncing-javascript-methods/

  debounce = (func, threshold, execAsap) ->
    timeout = undefined
    ->
      obj = this
      args = arguments

      delayed = ->
        if !execAsap
          func.apply obj, args
        timeout = null
        return

      if timeout
        clearTimeout timeout
      else if execAsap
        func.apply obj, args
      timeout = setTimeout(delayed, threshold or 100)
      return

  # smartresize

  jQuery.fn[sr] = (fn) ->
    if fn then @bind('resize', debounce(fn)) else @trigger(sr)

  return
) jQuery, 'smartresize'

# ---
# generated by js2coffee 2.2.0

; BetaSigmaKappa.com makefile
; -----------------------
; 
; This file will download all the necessary modules and themes to get the 
; Beta Sigma Kappa site configured with the contributed code that it is built on.

; Core version
; -----------------

core = 7.x

; API version
; -----------------

api = 2

; Core project
; -----------------
projects[drupal][version] = 7.26

; Contributed projects
; -----------------
projects[jquery_update][version] = 2.3
projects[jquery_update][subdir] = "contrib"

projects[features][version] = 2.0
projects[features][subdir] = "contrib"

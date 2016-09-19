# Project Rain website
Website for project-rain

## Repo Components
Middleman - Middleman front page code.

MariaDB - SQL for raining process.

BOINC Server files - Overwrite these files onto git cloned BOINC folder.

## Dependancies
https://github.com/marius311/boinc-server-docker/

---------

![BOINC](https://i.imgur.com/Wy4UOYL.png)

## What is BOINC?
[BOINC](https://boinc.berkeley.edu/) (Berkeley Open Infrastructure for Network Computing) is an open-source volunteer oriented computing grid that combines the processing power of all individual users for the purposes of scientific research.

Berkeley Open Infrastructure for Network Computing (BOINC) is an open-source middleware system which supports volunteer and grid computing. Originally developed to support the SETI@home project, it became generalized as a platform for other distributed applications in areas as diverse as mathematics, linguistics, medicine, molecular biology, climatology, environmental science, and astrophysics, among others. BOINC aims to enable researchers to tap into the enormous processing resources of multiple personal computers around the world.

## Can I create an BOINC project?
Anyone can create a BOINC project, there's no centralised authority that you are required to consult before creating a BOINC project.

If you've got an idea for a distributed computing project, head on over to the [BOINC project brainstorming thread on STEEM](https://steemit.com/gridcoin/@cm-steem/brainstorming-new-boinc-projects-anyone-can-create-a-project-and-reward-their-users-with-gridcoin) to get an idea of possible BOINC projects.

## What's this talk of a whitelist?
The [BOINC project whitelist](https://www.gridcoin.us/Guides/whitelist.htm) is a voted upon list of projects rewarded within the [Gridcoin network](https://www.gridcoin.us). The Gridcoin network doesn't distribute rewards to all existing BOINC projects because some projects are inactive/dead or are insecure & pose a potential risk to our users.

If you have concerns regarding the whitelist or wish to have your project whitelisted then speak up in the <a href="https://cryptocointalk.com/topic/29841-discussion-boinc-whitelist-monitoring/">Gridcoin whitelist thread</a>.

Due to the nature of this BOINC project, there's nothing stopping you from ignoring the whitelist and distributing your crypto assets against non-whitelisted projects but you do so at your own risk (and potentially at the risk of your own crypto community).

----------

![Project Rain](https://i.imgur.com/wTQKNRh.png)

## What is Project Rain?
'Project Rain' is the practice of distributing crypto assets to BOINC users based on their verified BOINC computation; it was initially devised within the Gridcoin network and has been expanded to multiple cryptocurrencies and all BOINC teams through this BOINC project.

Through this BOINC project, you will be able to match a user's BOINC CPID to their multiple crypto asset addresses/accounts to which you can distribute your asset against.

Think of Project Rain as a new share-dropping vector that doesn't require end-users handling wallet private keys nor providing proof of IRL identity.

What is exciting about project rain is that there are currently over 500,000 active BOINC users and 4 million total registered BOINC users to whom you could potentially distribute your choice of asset.

## What cryptocurrencies are currently supported?


## Is there a mandatory team requirement?
There is no mandatory team requirement for joining the website, all BOINC teams/users are welcome to join!
Assets may however be distributed by rain makers to specific teams since they have full freedom of choice to do so & there's no site interference on the matter.

## Who decides upon asset distribution details?
The 'rain maker' planning on 'raining' an asset is fully responsible for picking the projects and/or teams to target as well as the desired 'rain weight' for each project. The 'Project-Rain' BOINC project admin has no input on who/what gets 'rained' upon.

## Are supported cryptocurrencies endorsed by 'Project Rain'?
Project Rain has provided the ability for users to match their BOINC CPID to multiple cryptocurrency addresses/accounts, but this does not constitute financial advice nor endorsement of supported cryptocurrencies. 

Several of the supported cryptocurrencies are yet to be released, are in development or are planning ICO phases - be very careful & don't invest money you can't afford to lose (cryptocurrencies are incredibly volatile). Seriously consider consulting with financial advisors before making financial decisions.

## Are 'rained' assets endorsed by 'Project Rain'?
Assets distributed via the ‘project rain’ share-dropping vector are not by default officially endorsed by this website unless otherwise stated.

## Are fees charged for this service?
The Project Rain website does not charge fees. You'll likely have to pay a large fee to distribute your asset on your cryptocurrency platform of choice to handle the scale of the Project Rain distribution (thousands of receipients). Please do consider donating to help cover server costs.

------------------

## Can I contribute to the development of project-rain?
Yes, you certainly can! https://github.com/grctest/project-rain-site

I would really appreciate help finishing the 'rain tutorial' page: https://github.com/grctest/project-rain-site/blob/master/source/rain-tutorial.html.erb (I need specific info for how to create the equivalent of a 'sendmany' transaction to potentially tens of thousands of BOINC users on your crypto network platform).

I would also appreciate input on address validation for the planned supported cryptocurrencies, some which do not have completed documentation I have provided 254 field length despite likely requiring far less (or perhaps may require larger fields):

https://github.com/grctest/project-rain-site/blob/master/BOINC%20Server%20files/db/schema.sql#L338

https://github.com/grctest/project-rain-site/blob/master/BOINC%20Server%20files/db/boinc_db_types.h#L670
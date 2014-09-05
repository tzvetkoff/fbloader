# fbLoader

## Forenote

I really hate Adobe.
If you are a regulatively regular user, like me, you'll almost always allow them to install updates on your system.
I had to see this prompt screen to find that, no questions asked, Adobe's Flash Player installed a "Startup Item" - it's updater.

## Sidenote

Facebook sucks.
They still enforce users onto installing Adobe's Flash Player just to watch a (stupid) video on their site.
That **sucks**.

## Solution

Most videos on the web -are- were FLV (Flash-video) encoded.
Nowadays, almost everything is MP4/H264 - this can already be played by your browser *natively*.
Facebook is, for shit, once again, a shit.
They haven't heard about <video> yet... :-(

Yet again, Facebook **does** provide MP4 videos (Flash plays MP4 and FLV) but they haven't found necessary to switch to a native player - something Google/YouTube did long ago.

So we roll our own!

## Roll your own

This thingie requires PHP (version `5.3` should suffice).
Installation is even easier - `cd` to the directory desired and then just `git clone (the_url)`.
There's no additional configuration - you'll have to manually edit and hack into the existing PHP code if necessary.

## What then?

Issues.
Write one - I might even look into it...

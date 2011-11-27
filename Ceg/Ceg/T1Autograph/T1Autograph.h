//
//  T1Autograph.h
//  T1Autograph
//
//  Created by Peter Skinner on 2/26/11.
//  Copyright 2011 Ten One Design. All rights reserved.
//


/*	Usage Instructions:
 
 Drag the T1Autograph folder into your XCode project.
 
 1) #import "T1Autograph.h" in your view controller
 
 2) Use one of the two class methods to obtain a signature.
	- The easiest way (with a modal window) is by calling [T1Autograph autographWithDelegate:self modalDisplayString:nil];
	- To obtain a signature from your choice of UIView, call [T1Autograph autographWithView:myUIView delegate:self];
 
 3) To remove the watermark, use [autographInstance setLicenseCode:@"your40digitlicensecode"]; Purchase @"your40digitlicensecode" at http://tenonedesign.com/t1autograph
 
 For more usage info and examples, delve into the T1Autograph demo project.
 Support requests may be emailed to info@tenonedesign.com
 Follow @tenonedesign for library update notifications
 
*/


#import <Foundation/Foundation.h>
#import <UIKit/UIKit.h>
@class T1AutographController;

@protocol T1AutographDelegate <NSObject>
@optional
- (void)didDismissModalView;							// user closed autograph modal view
- (void)autographDidCompleteWithNoData;					// user pressed the done button without signing
- (void)autographDidCompleteWithImageData:(NSData *)imageData hashValue:(NSString *)hashValue;	// signature was successful
@end

@interface T1Autograph : NSObject {
	BOOL showGuideline;			// defaults to YES
	BOOL showDate;				// defaults to NO
	BOOL showHash;				// defaults to NO
	NSString *customHash;		// defaults to nil, use no more than 10 characters
	BOOL swipeToUndoEnabled;	// defaults to YES
	UIColor *strokeColor;		// defaults to [UIColor blackColor]
	float strokeWidth;			// defaults to 3
	float velocityReduction;	// defaults to 0.85
	float exportScale;			// defaults to 0.5
	
	NSString *lastHash;			// contains the last security hash, if any
	NSString *licenseCode;		// set this to remove the watermark on signatures.  Maybe be purchased via http://tenonedesign.com/t1autograph.php
		
	NSUInteger buildNumber;		// library build number (read only)
	
	// private
	T1AutographController *autographController;
	NSString *exportFormat;
}

@property (assign) BOOL showGuideline;
@property (assign) BOOL showDate;
@property (assign) BOOL showHash;
@property (assign) BOOL swipeToUndoEnabled;
@property (retain) UIColor *strokeColor;
@property (assign) float strokeWidth;
@property (assign) float velocityReduction;
@property (assign) float exportScale;
@property (retain) NSString *licenseCode;
@property (assign, readonly) NSUInteger buildNumber;
@property (retain, readonly) NSString *lastHash;
@property (retain) NSString *customHash;


+ (id)autographWithDelegate:(id)eventDelegate modalDisplayString:(NSString *)displayString;
+ (id)autographWithView:(id)theView delegate:(id)eventDelegate;

- (id)initWithView:(id)theView delegate:(id)eventDelegate modal:(BOOL)modalInput modalDisplayString:(NSString *)displayString;
- (IBAction)reset:(id)sender;
- (IBAction)done:(id)sender;

@end

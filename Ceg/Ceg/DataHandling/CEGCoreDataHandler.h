//
//  CEGCoreDataHandler.h
//  Ceg
//
//  Created by Christian Rönningen on 2011-11-26.
//  Copyright (c) 2011 Paperton. All rights reserved.
//

#import <Foundation/Foundation.h>

@interface CEGCoreDataHandler : NSObject

+ (CEGCoreDataHandler* ) sharedInstance;

- (void) importData:(NSDictionary*)data;
- (void) cleanType:(NSString*)aType;

@property (retain, nonatomic) NSFetchedResultsController *fetchedResultsController;
@property (retain, nonatomic) NSManagedObjectContext *managedObjectContext;

- (NSManagedObject*) createFormFromApprentice:(NSManagedObject*)aApprentice andVisit:(NSManagedObject*)aVisit;
- (NSDictionary*) dictionaryFromForm:(NSManagedObject*)managedObj;

@end
